<?php

namespace AntdAdmin\Controller;


use Think\Controller;

class AreaController extends Controller
{
    public function forCascader()
    {
        // 获取选中值
        $value = I('value');
        if ($value) {
            $rows = $this->getParentsToValue($value);
            $this->ajaxReturn($rows);
        }

        // 获取所有子节点
        $maxLevel = I('maxLevel', 3);
        $field = 'id as value,cname as label,level';
        $selected = I('selected');
        if (!$selected) {
            $map['level'] = 1;
        } else {
            $map['upid'] = $selected;
        }
        $rows = D('Area')->where($map)->field($field)->select();
        foreach ($rows as &$row) {
            $row['isLeaf'] = $row['level'] >= $maxLevel;
        }
        $this->ajaxReturn($rows);
    }

    // 递归获取某个值的所有父级并以树形结构返回，包括兄弟节点
    protected function getParentsToValue($value, $children = [], $isLeaf = true)
    {
        $area = D('Area')->where(['id' => $value])->find();
        if ($area['level'] == 0) {
            return $children;
        }
        $map['upid'] = $area['upid'];
        $rows = D('Area')->where($map)->field('id as value,cname as label')->select();
        foreach ($rows as &$row) {
            if ($row['value'] == $value) {
                $row['children'] = $children;
            }
            $row['isLeaf'] = $isLeaf;
        }
        return $this->getParentsToValue($area['upid'], $rows, false);
    }
}
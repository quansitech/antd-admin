<?php

namespace AntdAdmin\Controller;


use Think\Controller;

class AreaController extends Controller
{
    public function forCascader()
    {
        $maxLevel = I('maxLevel', 3);
        $selected = I('selected');

        // 获取所有子节点
        $field = 'id as value,cname as label,level';
        if (!$selected) {
            $map['level'] = 1;
        } else {
            $map['upid'] = $selected;
        }
        $rows = D('Area')->where($map)->field($field)->select();
        foreach ($rows as &$row) {
            $hasChildren = D('Area')->where(['upid' => $row['value']])->count();
            $row['isLeaf'] = $row['level'] >= $maxLevel || !$hasChildren;
        }
        $this->ajaxReturn($rows);
    }
}
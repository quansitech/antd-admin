<?php

namespace AntdAdmin\Component\ColumnType;

class Area extends Cascader
{
    use HasExtraDataRender;

    protected $maxLevel = null;

    public function __construct($dataIndex, $title)
    {
        parent::__construct($dataIndex, $title);
    }

    /**
     * 设置最大级数 省 1，市 2，县 3
     * @param $level
     * @return $this
     */
    public function setMaxLevel($level)
    {
        $this->maxLevel = $level;
        return $this;
    }

    public function render()
    {
        if (!isset($this->render_data['fieldProps']['loadDataUrl'])) {
            $this->setLoadDataUrl(U('Antd/Area/forCascader', ['maxLevel' => $this->maxLevel]));
        }
        return parent::render();
    }

    protected function getExtraRenderValue(mixed $value)
    {
        if (!$value) {
            return null;
        }
        $options = $this->getParentOptionsToValue($value);

        return [
            'options' => $options,
        ];
    }


    // 递归获取某个值的所有父级并以树形结构返回，包括兄弟节点
    protected function getParentOptionsToValue($value, $children = [])
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
            $hasChildren = D('Area')->where(['upid' => $row['value']])->count();
            $row['isLeaf'] = ($this->maxLevel ?: 3) <= $row['level'] || !$hasChildren;
        }
        return $this->getParentOptionsToValue($area['upid'], $rows);
    }
}
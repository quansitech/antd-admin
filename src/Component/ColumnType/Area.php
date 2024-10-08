<?php

namespace AntdAdmin\Component\ColumnType;

class Area extends Cascader
{
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
}
<?php

namespace AntdAdmin\Component\Table\ColumnType;

use AntdAdmin\Component\ColumnType\BaseColumn;
use AntdAdmin\Component\Traits\HasContainer;

class Option extends BaseColumn
{
    use HasContainer;

    public function __construct($dataIndex, $title)
    {
        parent::__construct($dataIndex, $title);
        $this->render_data['options'] = new OptionsContainer();
        $this->render_data['key'] = 'options';
        $this->setFixed('right');
    }

    protected function getValueType(): string
    {
        return 'option';
    }

    /**
     * 设置操作
     * @param $callback
     * @return $this
     * @throws \ReflectionException
     * @throws \Think\Exception
     */
    public function options($callback)
    {
        $this->handleContainer('options', $callback);
        return $this;
    }
}
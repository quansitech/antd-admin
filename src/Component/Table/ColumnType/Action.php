<?php

namespace AntdAdmin\Component\Table\ColumnType;

use AntdAdmin\Component\ColumnType\BaseColumn;
use AntdAdmin\Component\Traits\HasContainer;

class Action extends BaseColumn
{
    use HasContainer;

    public function __construct($dataIndex, $title)
    {
        parent::__construct($dataIndex, $title);
        $this->render_data['actions'] = new ActionsContainer();
        $this->render_data['key'] = 'action';
        $this->setFixed('right');
        $this->setSearch(false);
    }

    protected function getValueType(): string
    {
        return 'action';
    }

    /**
     * 设置操作
     * @param $callback
     * @return $this
     * @throws \ReflectionException
     * @throws \Think\Exception
     */
    public function actions($callback)
    {
        $this->handleContainer('actions', $callback);
        return $this;
    }
}
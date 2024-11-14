<?php

namespace AntdAdmin\Component\Form\ColumnType;

use AntdAdmin\Component\ColumnType\BaseColumn;
use AntdAdmin\Component\Form\ColumnsContainer;
use AntdAdmin\Component\Traits\HasShowCondition;

class Dependency extends BaseColumn
{
    use HasShowCondition;

    protected ColumnsContainer $columns;

    public function __construct()
    {
        parent::__construct('', '');
        $this->columns = new ColumnsContainer();
        $this->render_data['showRules'] = [];
        $this->render_data['columns'] = $this->columns;
    }

    /**
     * 设置表单项
     * @param callable $callback
     * @return $this
     * @throws \Exception
     */
    public function columns(callable $callback)
    {
        if (!is_callable($callback)) {
            throw new \Exception('回调必须为callable');
        }
        $this->columns->setForm($this->form);
        $callback($this->columns);
        return $this;
    }

    protected function getValueType(): string
    {
        return 'dependency';
    }
}
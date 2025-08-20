<?php

namespace AntdAdmin\Component\Form\ColumnType;

use AntdAdmin\Component\ColumnType\BaseColumn;
use AntdAdmin\Component\Form\ColumnsContainer;
use AntdAdmin\Component\Traits\HasContainer;

class FormList extends BaseColumn
{
    const MODE_TABLE = 'table';
    const MODE_FORM_LIST = 'form_list';

    use HasContainer;

    public function __construct($dataIndex, $title)
    {
        parent::__construct($dataIndex, $title);
        $this->render_data['mode'] = self::MODE_FORM_LIST;
    }

//    public function setMode($mode)
//    {
//        $this->render_data['mode'] = $mode;
//        return $this;
//    }

    protected function getValueType(): string
    {
        return 'formList';
    }

    protected function beforeAddForm()
    {
        parent::beforeAddForm();
        $this->setFormItemWidth(24);
    }

    protected function afterAddForm()
    {
        parent::afterAddForm();

        $columnsContainer = new ColumnsContainer();
        $columnsContainer->setForm($this->form);
        $columnsContainer->setFormList($this);
        $this->render_data['columns'] = $columnsContainer;
    }

    /**
     * 设置列
     * @param $callback callable
     * @return FormList
     * @throws \Exception
     */
    public function columns(callable $callback): static
    {
        $this->handleContainer('columns', $callback);
        return $this;
    }

    public function getInitialValues(): array
    {
        $formValues = $this->form->getInitialValues();
        return $formValues[$this->render_data['dataIndex']] ?? [];
    }

    public function render()
    {
        // 初始化数据
        $formValues = $this->form->getInitialValues();
        $initValues = $formValues[$this->render_data['dataIndex']] ?? [];
        if (empty($initValues)) {
            $initValues = [(object)[]];
        }
        $formValues[$this->render_data['dataIndex']] = $initValues;
        $this->form->setInitialValues($formValues);

        return parent::render();
    }
}
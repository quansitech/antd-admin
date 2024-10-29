<?php

namespace AntdAdmin\Component\Form\ColumnType;

use AntdAdmin\Component\ColumnType\BaseColumn;

class Ueditor extends BaseColumn
{
    public function __construct($dataIndex, $title)
    {
        parent::__construct($dataIndex, $title);
        $this->render_data['fieldProps'] = [
            'ueditorPath' => asset('ueditor'),
        ];
    }

    protected function getValueType(): string
    {
        return 'ueditor';
    }

    public function setConfig($config)
    {
        $this->render_data['fieldProps']['config'] = $config;
        return $this;
    }

    protected function beforeAddForm()
    {
        parent::beforeAddForm();
        $this->setFormItemWidth(18);
    }

}
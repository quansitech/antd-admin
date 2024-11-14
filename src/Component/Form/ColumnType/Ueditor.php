<?php

namespace AntdAdmin\Component\Form\ColumnType;

use AntdAdmin\Component\ColumnType\BaseColumn;

class Ueditor extends BaseColumn
{
    protected string $ueditorPath = '';

    public function __construct($dataIndex, $title)
    {
        parent::__construct($dataIndex, $title);
        $this->ueditorPath = asset('ueditor');
        $this->render_data['fieldProps'] = [];
    }

    public function setUeditorPath(string $path)
    {
        $this->ueditorPath = $path;
        return $this;
    }

    public function render()
    {
        $this->render_data['fieldProps']['ueditorPath'] = $this->getUeditorPath();

        return parent::render();
    }

    /**
     * @return string
     */
    public function getUeditorPath()
    {
        return $this->ueditorPath;
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
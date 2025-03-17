<?php

namespace AntdAdmin\Component\ColumnType;

class Digit extends BaseColumn
{

    protected $min = null;
    protected $max = null;

    public function setMin($min)
    {
        $this->min = $min;
        return $this;
    }

    public function setMax($max)
    {
        $this->max = $max;
        return $this;
    }

    protected function getValueType(): string
    {
        return 'digit';
    }

    public function render()
    {
        if (!isset($this->render_data['fieldProps'])) {
            $this->render_data['fieldProps'] = [];
        }
        $this->render_data['fieldProps']['min'] = $this->render_data['fieldProps']['min'] ?? $this->min;
        $this->render_data['fieldProps']['max'] = $this->render_data['fieldProps']['max'] ?? $this->max;
        return parent::render();
    }
}
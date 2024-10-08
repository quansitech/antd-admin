<?php

namespace AntdAdmin\Component\ColumnType\RuleType;

class Eq extends BaseRule
{
    public function __construct($value, string $message = '')
    {
        $message = $message ?: '该字段只能是' . $value;
        parent::__construct($message);
        $this->render_data['enum'] = [$value];
        $this->render_data['type'] = 'enum';
    }
}
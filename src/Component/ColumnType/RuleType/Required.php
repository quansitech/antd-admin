<?php

namespace AntdAdmin\Component\ColumnType\RuleType;

class Required extends BaseRule
{
    public function __construct(string $message = '')
    {
        $message = $message ?: '该字段必填';
        parent::__construct($message);
        $this->render_data['required'] = true;
    }
}
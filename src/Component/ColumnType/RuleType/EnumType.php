<?php

namespace AntdAdmin\Component\ColumnType\RuleType;

class EnumType extends BaseRule
{
    public function __construct(array $enum, string $message = '')
    {
        $message = $message ?: '请选择正确的选项';
        parent::__construct($message);
        $this->render_data['enum'] = $enum;
        $this->render_data['type'] = 'enum';
    }
}
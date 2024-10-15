<?php

namespace AntdAdmin\Component\ColumnType\RuleType;

class Neq extends BaseRule
{
    public function __construct($value, string $message = '')
    {
        $checkValue = $value;
        switch ($value) {
            case 'null':
                $checkValue = null;
                break;
            case 'true':
                $checkValue = true;
                break;
            case 'false':
                $checkValue = false;
                break;
        }

        $message = $message ?: '该字段不能是' . $value;
        parent::__construct($message);
        $this->render_data['customType'] = 'notInEnum';
        $this->render_data['enum'] = [$checkValue];
    }
}
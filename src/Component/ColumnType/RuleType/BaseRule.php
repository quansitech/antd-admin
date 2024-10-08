<?php

namespace AntdAdmin\Component\ColumnType\RuleType;

use AntdAdmin\Component\BaseComponent;

abstract class BaseRule extends BaseComponent
{
    public function __construct(string $message = '')
    {
        $message = $message ?: '该字段输入有误';
        $this->render_data['message'] = $message;
    }
}
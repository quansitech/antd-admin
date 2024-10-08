<?php

namespace AntdAdmin\Component\ColumnType\RuleType;

class Type extends BaseRule
{
    /**
     * @param string $type 类型，可选值参考 https://github.com/react-component/async-validator#type
     * @param string $message
     */
    public function __construct(string $type, string $message = '')
    {
        $message = $message ?: '类型不正确';
        parent::__construct($message);
        $this->render_data['type'] = $type;
    }
}
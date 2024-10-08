<?php

namespace AntdAdmin\Component\ColumnType\RuleType;

class Pattern extends BaseRule
{

    /**
     * @param string $pattern 正则表达式，不需要加 /
     * @param string $message
     */
    public function __construct(string $pattern, string $message = '')
    {
        $message = $message ?: '格式不正确';
        parent::__construct($message);
        $this->render_data['pattern'] = $pattern;
    }
}
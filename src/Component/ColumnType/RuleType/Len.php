<?php

namespace AntdAdmin\Component\ColumnType\RuleType;

class Len extends BaseRule
{
    public function __construct(int $len, string $message = '')
    {
        $message = $message ?: '长度必需为' . $len;
        parent::__construct($message);
        $this->render_data['len'] = $len;
    }
}
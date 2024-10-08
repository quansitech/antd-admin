<?php

namespace AntdAdmin\Component\ColumnType\RuleType;

class Min extends BaseRule
{

    /**
     * @param string $type 'array' | 'number' | 'string'
     * @param $min
     * @param string $message
     */
    public function __construct(string $type, $min, string $message = '')
    {
        $message = $message ?: '必需大于' . $min;
        parent::__construct($message);
        $this->render_data['min'] = $min;
        $this->render_data['type'] = $type;
    }
}
<?php

namespace AntdAdmin\Component\ColumnType\RuleType;

class Max extends BaseRule
{

    /**
     * @param string $type 'array' | 'string' | 'number'
     * @param $max
     * @param string $message
     */
    public function __construct(string $type, $max, string $message = '')
    {
        $message = $message ?: '必需小于' . $max;
        parent::__construct($message);
        $this->render_data['max'] = $max;
        $this->render_data['type'] = $type;
    }
}
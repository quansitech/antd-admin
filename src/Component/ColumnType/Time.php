<?php

namespace AntdAdmin\Component\ColumnType;

class Time extends BaseColumn
{

    protected function getValueType(): string
    {
        return 'time';
    }
}
<?php

namespace AntdAdmin\Component\ColumnType;

class DateMonth extends BaseColumn
{

    protected function getValueType(): string
    {
        return 'dateMonth';
    }
}
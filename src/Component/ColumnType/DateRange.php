<?php

namespace AntdAdmin\Component\ColumnType;

class DateRange extends BaseColumn
{

    protected function getValueType(): string
    {
        return 'dateRange';
    }
}
<?php

namespace AntdAdmin\Component\ColumnType;

class DateTimeRange extends BaseColumn
{

    protected function getValueType(): string
    {
        return 'dateTimeRange';
    }
}
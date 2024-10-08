<?php

namespace AntdAdmin\Component\ColumnType;

class TimeRange extends BaseColumn
{

    protected function getValueType(): string
    {
        return 'timeRange';
    }
}
<?php

namespace AntdAdmin\Component\ColumnType;

class DateTime extends BaseColumn
{

    protected function getValueType(): string
    {
        return 'dateTime';
    }
}
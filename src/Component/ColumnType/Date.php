<?php

namespace AntdAdmin\Component\ColumnType;

class Date extends BaseColumn
{

    protected function getValueType(): string
    {
        return 'date';
    }
}
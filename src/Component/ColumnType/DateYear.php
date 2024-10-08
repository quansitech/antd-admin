<?php

namespace AntdAdmin\Component\ColumnType;

class DateYear extends BaseColumn
{

    protected function getValueType(): string
    {
        return 'dateYear';
    }
}
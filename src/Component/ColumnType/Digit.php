<?php

namespace AntdAdmin\Component\ColumnType;

class Digit extends BaseColumn
{

    protected function getValueType(): string
    {
        return 'digit';
    }
}
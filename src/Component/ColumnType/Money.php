<?php

namespace AntdAdmin\Component\ColumnType;

class Money extends BaseColumn
{

    protected function getValueType(): string
    {
        return 'money';
    }
}
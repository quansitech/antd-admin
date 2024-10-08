<?php

namespace AntdAdmin\Component\ColumnType;

class Password extends BaseColumn
{

    protected function getValueType(): string
    {
        return 'password';
    }
}
<?php

namespace AntdAdmin\Component\ColumnType;

class Text extends BaseColumn
{

    protected function getValueType(): string
    {
        return 'text';
    }
}
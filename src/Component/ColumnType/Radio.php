<?php

namespace AntdAdmin\Component\ColumnType;

use AntdAdmin\Component\Traits\HasOptions;

class Radio extends BaseColumn
{
    use HasOptions;

    protected function getValueType(): string
    {
        return 'radio';
    }
}
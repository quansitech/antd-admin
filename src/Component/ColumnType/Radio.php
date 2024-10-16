<?php

namespace AntdAdmin\Component\ColumnType;

use AntdAdmin\Component\Traits\HasValueEnum;

class Radio extends BaseColumn
{
    use HasValueEnum;

    protected function getValueType(): string
    {
        return 'radio';
    }
}
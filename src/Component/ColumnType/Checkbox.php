<?php

namespace AntdAdmin\Component\ColumnType;

use AntdAdmin\Component\Traits\HasOptions;

class Checkbox extends BaseColumn
{
    use HasOptions;

    protected function getValueType(): string
    {
        return 'checkbox';
    }

}
<?php

namespace AntdAdmin\Component\ColumnType;

use AntdAdmin\Component\Traits\HasValueEnum;

class Checkbox extends BaseColumn
{
    use HasValueEnum;

    protected function getValueType(): string
    {
        return 'checkbox';
    }

}
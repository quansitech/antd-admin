<?php

namespace AntdAdmin\Component\ColumnType;

use AntdAdmin\Component\Traits\HasValueEnum;

class SwitchType extends BaseColumn
{
    use HasValueEnum;

    protected function getValueType(): string
    {
        return 'switch';
    }
}
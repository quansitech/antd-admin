<?php

namespace AntdAdmin\Component\ColumnType;

use AntdAdmin\Component\Traits\HasValueEnum;

class RadioButton extends BaseColumn
{
    use HasValueEnum;

    protected function getValueType(): string
    {
        return 'radioButton';
    }
}
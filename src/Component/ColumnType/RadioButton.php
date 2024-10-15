<?php

namespace AntdAdmin\Component\ColumnType;

use AntdAdmin\Component\Traits\HasOptions;

class RadioButton extends BaseColumn
{
    use HasOptions;

    protected function getValueType(): string
    {
        return 'radioButton';
    }
}
<?php

namespace AntdAdmin\Component\ColumnType;

use AntdAdmin\Component\Traits\HasOptions;

class SwitchType extends BaseColumn
{
    use HasOptions;

    protected function getValueType(): string
    {
        return 'switch';
    }
}
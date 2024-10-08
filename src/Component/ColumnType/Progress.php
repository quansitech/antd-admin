<?php

namespace AntdAdmin\Component\ColumnType;

class Progress extends BaseColumn
{

    protected function getValueType(): string
    {
        return 'progress';
    }
}
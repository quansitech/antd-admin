<?php

namespace AntdAdmin\Component\ColumnType;

class Textarea extends BaseColumn
{

    protected function getValueType(): string
    {
        return 'textarea';
    }
}
<?php

namespace AntdAdmin\Component\Form\ColumnType;

use AntdAdmin\Component\ColumnType\BaseColumn;

class RichText extends BaseColumn
{

    protected function getValueType(): string
    {
        return 'richText';
    }
}
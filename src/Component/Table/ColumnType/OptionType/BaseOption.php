<?php

namespace AntdAdmin\Component\Table\ColumnType\OptionType;

use AntdAdmin\Component\BaseComponent;
use AntdAdmin\Component\Traits\HasShowRules;

abstract class BaseOption extends BaseComponent
{
    use HasShowRules;

    abstract protected function getType();

    public function __construct($title)
    {
        $this->render_data = [
            'title' => $title,
            'type' => $this->getType(),
        ];
    }
}
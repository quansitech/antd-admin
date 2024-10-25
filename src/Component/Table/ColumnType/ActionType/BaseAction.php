<?php

namespace AntdAdmin\Component\Table\ColumnType\ActionType;

use AntdAdmin\Component\BaseComponent;
use AntdAdmin\Component\Traits\HasShowRules;

abstract class BaseAction extends BaseComponent
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
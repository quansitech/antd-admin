<?php

namespace AntdAdmin\Component\Table\ColumnType\ActionType;

use AntdAdmin\Component\BaseComponent;
use AntdAdmin\Component\Traits\HasAuthNode;
use AntdAdmin\Component\Traits\HasBadge;
use AntdAdmin\Component\Traits\HasShowCondition;

abstract class BaseAction extends BaseComponent
{
    use HasShowCondition, HasBadge, HasAuthNode;

    abstract protected function getType();

    public function __construct($title)
    {
        $this->render_data = [
            'title' => $title,
            'type' => $this->getType(),
        ];
    }
}
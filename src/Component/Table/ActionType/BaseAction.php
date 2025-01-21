<?php

namespace AntdAdmin\Component\Table\ActionType;

use AntdAdmin\Component\BaseComponent;
use AntdAdmin\Component\Table;
use AntdAdmin\Component\Traits\HasBadge;

abstract class BaseAction extends BaseComponent
{
    use HasBadge;

    protected Table $table;

    abstract protected function getType();

    public function setTable(Table $table)
    {
        $this->table = $table;
        return $this;
    }

    public function __construct(string $title)
    {
        $this->render_data['title'] = $title;
        $this->render_data['type'] = $this->getType();
        $this->render_data['props'] = [];
    }
}
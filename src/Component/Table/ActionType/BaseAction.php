<?php

namespace AntdAdmin\Component\Table\ActionType;

use AntdAdmin\Component\BaseComponent;

abstract class BaseAction extends BaseComponent
{
    abstract protected function getType();

    public function __construct(string $title)
    {
        $this->render_data['title'] = $title;
        $this->render_data['type'] = $this->getType();
        $this->render_data['props'] = [];
    }
}
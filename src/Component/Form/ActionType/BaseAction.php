<?php

namespace AntdAdmin\Component\Form\ActionType;

use AntdAdmin\Component\BaseComponent;

abstract class BaseAction extends BaseComponent
{
    public function __construct(string $title)
    {
        $this->render_data['title'] = $title;
        $this->render_data['type'] = $this->getType();
    }

    abstract protected function getType(): string;
}
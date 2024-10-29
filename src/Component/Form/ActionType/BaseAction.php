<?php

namespace AntdAdmin\Component\Form\ActionType;

use AntdAdmin\Component\BaseComponent;
use AntdAdmin\Component\Traits\HasBadge;

abstract class BaseAction extends BaseComponent
{
    use HasBadge;

    public function __construct(string $title)
    {
        $this->render_data['title'] = $title;
        $this->render_data['type'] = $this->getType();
    }

    abstract protected function getType(): string;
}
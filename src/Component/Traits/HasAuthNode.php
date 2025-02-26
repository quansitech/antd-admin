<?php

namespace AntdAdmin\Component\Traits;

trait HasAuthNode
{
    protected $auth_node = '';

    public function getAuthNode()
    {
        return $this->auth_node;
    }

    public function setAuthNode(string $auth_node)
    {
        $this->auth_node = $auth_node;
        return $this;
    }
}
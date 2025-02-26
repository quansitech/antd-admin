<?php

namespace AntdAdmin\Component\Traits;

trait RelateAuthNodeForContainer
{
    public function render()
    {
        $this->render_data = array_values(array_filter($this->render_data, function ($item) {
            if (!method_exists($item, 'getAuthNode')) {
                return true;
            }
            if (!$item->getAuthNode()) {
                return true;
            }
            return verifyAuthNode($item->getAuthNode());
        }));

        return parent::render();
    }
}
<?php

namespace AntdAdmin\Component\Traits;

use AntdAdmin\Component\Modal\Modal;

trait HasModalAction
{

    /**
     * @param string $title
     * @param Modal $modal
     * @return $this
     */
    public function modal(Modal $modal)
    {
        $this->render_data['modal'] = $modal;
        return $this;
    }
}
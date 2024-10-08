<?php

namespace AntdAdmin\Component\Traits;

use AntdAdmin\Component\Modal\ModalContent;

trait HasModalAction
{


    /**
     * @param string $title
     * @param ModalContent $content
     * @return $this
     */
    public function modal(string $title, ModalContent $content, string $width = '60%')
    {
        $this->render_data['modal'] = [
            'title' => $title,
            'content' => $content->render(),
            'width' => $width,
        ];
        return $this;
    }
}
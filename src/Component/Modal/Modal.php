<?php

namespace AntdAdmin\Component\Modal;

use AntdAdmin\Component\BaseComponent;

/**
 * @method $this setTitle(string $title) 设置标题
 * @method $this setWidth(string $width) 设置宽度
 */
class Modal extends BaseComponent
{

    public function setContent(ModalPropsInterface $props)
    {
        $this->render_data['content'] = [
            'props' => $props,
        ];
        return $this;
    }

    public function setUrl(string $url)
    {
        $this->render_data['content'] = [
            'url' => $url,
        ];
        return $this;
    }

    public function render()
    {
        /** @var ModalPropsInterface $props */
        $props = $this->render_data['content']['props'] ?? null;
        if ($props) {
            $this->render_data['content']['props'] = $props->getModalProps();
        }
        return parent::render();
    }

}
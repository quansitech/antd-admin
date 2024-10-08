<?php

namespace AntdAdmin\Component\Modal;

use AntdAdmin\Component\BaseComponent;

/**
 * @method $this setType(string $type) 设置类型 目前仅支持 form | table
 * @method $this setUrl(string $url) 设置内容props请求地址
 * @method $this setProps(ModalPropsInterface $props) 设置props
 */
class ModalContent extends BaseComponent
{
    protected function getConflictPropAttributes(): array
    {
        return [
            'props',
            'url',
        ];
    }

    public function render()
    {
        /** @var ModalPropsInterface $props */
        $props = $this->render_data['props'];
        if ($props) {
            $this->render_data['props'] = $props->getModalProps();
        }
        return parent::render();
    }

}
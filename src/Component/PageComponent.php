<?php

namespace AntdAdmin\Component;

use AntdAdmin\Component\Modal\ModalPropsInterface;
use Qscmf\Lib\Inertia\Inertia;


trait PageComponent
{
    public function setMetaTitle($title)
    {
        Inertia::getInstance()->share('layoutProps.metaTitle', $title);
        return $this;
    }

    abstract protected function getPageComponent();


    public function render($showView = true)
    {
        if ($this instanceof ModalPropsInterface && $this->acceptModal()) {
            $this->modalRender();
        }

        $render_data = parent::render();
        if ($showView) {
            Inertia::getInstance()->render($this->getPageComponent(), $render_data);
        }
        return $render_data;
    }

    private function acceptModal()
    {
        $headers = getallheaders();
        return !!$headers['X-Modal'];
    }

    private function modalRender()
    {
        static $modalRender = false;
        if ($modalRender) {
            return;
        }
        $modalRender = true;
        header('Content-Type: application/json');
        qs_exit(json_encode($this->getModalProps()));
    }
}
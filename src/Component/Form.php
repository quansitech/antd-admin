<?php

namespace AntdAdmin\Component;

use AntdAdmin\Component\Form\ActionsContainer;
use AntdAdmin\Component\Form\ActionType\Button;
use AntdAdmin\Component\Form\ColumnsContainer;
use AntdAdmin\Component\Modal\ModalPropsInterface;
use AntdAdmin\Component\Tabs\PaneInterface;
use AntdAdmin\Component\Traits\HasContainer;

/**
 * @method self setReadonly(bool $readonly) 设置是否只读
 * @method self setExtraRenderValues(array $extraValue) 设置额外渲染的值，用于需要额外值的表单项渲染
 */
class Form extends BaseComponent implements PaneInterface, ModalPropsInterface
{
    use PageComponent, HasContainer;

    public function __construct()
    {
        $columnsContainer = new ColumnsContainer();
        $columnsContainer->setForm($this);

        $actionsContainer = new ActionsContainer();

        $this->render_data['columns'] = $columnsContainer;
        $this->render_data['actions'] = $actionsContainer;

        $this->render_data['extraRenderValues'] = [];
    }

    public function columns($callback): static
    {
        $this->handleContainer('columns', $callback);
        return $this;
    }

    public function actions($callback): static
    {
        $this->handleContainer('actions', $callback);
        return $this;
    }

    /**
     * @param array $array
     * @return $this
     */
    public function setInitialValues(array $array): static
    {
        $this->render_data['initialValues'] = $array;
        return $this;
    }

    public function getInitialValues()
    {
        return $this->render_data['initialValues'];
    }

    protected function getPageComponent(): string
    {
        return 'Admin/Form';
    }


    public function getTabPaneComponent(): string
    {
        return 'form';
    }

    public function getTabPaneProps(): array
    {
        return $this->render(false);
    }

    public function getModalProps()
    {
        return $this->render(false);
    }

    public function setSubmitRequest($method, $url, $data = null, $headers = null, $afterAction = [Button::AFTER_ACTION_CLOSE_MODAL, Button::AFTER_ACTION_TABLE_RELOAD])
    {
        $this->render_data['submitRequest'] = [
            'method' => $method,
            'url' => $url,
            'data' => $data,
            'headers' => $headers,
            'afterAction' => $afterAction,
        ];
        return $this;
    }

    public function getExtraRenderValues()
    {
        return $this->render_data['extraRenderValues'];
    }
}
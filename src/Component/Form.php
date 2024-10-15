<?php

namespace AntdAdmin\Component;

use AntdAdmin\Component\Form\ActionsContainer;
use AntdAdmin\Component\Form\ColumnsContainer;
use AntdAdmin\Component\Modal\ModalPropsInterface;
use AntdAdmin\Component\Tabs\PaneInterface;
use AntdAdmin\Component\Traits\HasContainer;

/**
 * @method self setReadonly(bool $readonly) 设置是否只读
 */
class Form extends BaseComponent implements PaneInterface, ModalPropsInterface
{
    use PageComponent, HasContainer;

    public function __construct()
    {
        $this->render_data['columns'] = new ColumnsContainer();
        $this->render_data['actions'] = new ActionsContainer();
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
}
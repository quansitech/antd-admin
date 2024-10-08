<?php

namespace AntdAdmin\Component\Form;

use AntdAdmin\Component\BaseComponent;
use AntdAdmin\Component\Form\ActionType\BaseAction;
use AntdAdmin\Component\Form\ActionType\Button;
use AntdAdmin\Lib\AutoCallAddComponent;

/**
 * @method Button button(string $title) 按钮
 */
class ActionsContainer extends BaseComponent
{
    use AutoCallAddComponent;

    public function addAction(BaseAction $action): BaseAction
    {
        $this->render_data[] = $action;
        return $action;
    }

    protected function getCallMethod(): string
    {
        return 'addAction';
    }

    protected function getNamespace(): string
    {
        return 'AntdAdmin\\Component\\Form\\ActionType\\';
    }
}
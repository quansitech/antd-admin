<?php

namespace AntdAdmin\Component\Table;

use AntdAdmin\Component\BaseComponent;
use AntdAdmin\Component\Table\ActionType\BaseAction;
use AntdAdmin\Component\Table\ActionType\Button;
use AntdAdmin\Component\Table\ActionType\StartEditable;
use AntdAdmin\Component\Table\ColumnType\BaseColumn;
use AntdAdmin\Component\Table\ColumnType\Select;
use AntdAdmin\Component\Table\ColumnType\Text;
use AntdAdmin\Lib\AutoCallAddComponent;


/**
 * @method Button button(string $title)
 * @method StartEditable startEditable(string $title)
 */
class ActionsContainer extends BaseComponent
{
    use AutoCallAddComponent;

    public function addAction(BaseAction $action)
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
        return 'AntdAdmin\\Component\\Table\\ActionType\\';
    }
}
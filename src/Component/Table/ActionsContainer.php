<?php

namespace AntdAdmin\Component\Table;

use AntdAdmin\Component\BaseComponent;
use AntdAdmin\Component\Table;
use AntdAdmin\Component\Table\ActionType\BaseAction;
use AntdAdmin\Component\Table\ActionType\Button;
use AntdAdmin\Component\Table\ActionType\StartEditable;
use AntdAdmin\Component\Traits\RelateAuthNodeForContainer;
use AntdAdmin\Lib\AutoCallAddComponent;


/**
 * @method Button button(string $title)
 * @method StartEditable startEditable(string $title)
 */
class ActionsContainer extends BaseComponent
{
    use AutoCallAddComponent, RelateAuthNodeForContainer;

    protected Table $table;

    public function setTable(Table $table)
    {
        $this->table = $table;
        return $this;
    }

    public function addAction(BaseAction $action)
    {
        $action->setTable($this->table);
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
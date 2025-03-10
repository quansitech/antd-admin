<?php

namespace AntdAdmin\Component\Table\ColumnType;

use AntdAdmin\Component\BaseComponent;
use AntdAdmin\Component\Table\ColumnType\ActionType\BaseAction;
use AntdAdmin\Component\Table\ColumnType\ActionType\Link;
use AntdAdmin\Component\Traits\RelateAuthNodeForContainer;
use AntdAdmin\Lib\AutoCallAddComponent;

/**
 * @method Link link(string $title)
 */
class ActionsContainer extends BaseComponent
{
    use AutoCallAddComponent, RelateAuthNodeForContainer;

    public function addOption(BaseAction $option): BaseAction
    {
        $this->render_data[] = $option;
        return $option;
    }

    protected function getCallMethod(): string
    {
        return 'addOption';
    }

    protected function getNamespace(): string
    {
        return 'AntdAdmin\\Component\\Table\ColumnType\\ActionType\\';
    }
}
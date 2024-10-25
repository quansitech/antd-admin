<?php

namespace AntdAdmin\Component\Table\ColumnType;

use AntdAdmin\Component\BaseComponent;
use AntdAdmin\Component\Table\ColumnType\ActionType\BaseAction;
use AntdAdmin\Component\Table\ColumnType\ActionType\Link;
use AntdAdmin\Lib\AutoCallAddComponent;

/**
 * @method Link link(string $title)
 */
class ActionsContainer extends BaseComponent
{
    use AutoCallAddComponent;

    public function addOption(BaseAction $option)
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
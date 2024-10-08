<?php

namespace AntdAdmin\Component\Table\ColumnType;

use AntdAdmin\Component\BaseComponent;
use AntdAdmin\Component\Table\ColumnType\OptionType\BaseOption;
use AntdAdmin\Component\Table\ColumnType\OptionType\Link;
use AntdAdmin\Lib\AutoCallAddComponent;

/**
 * @method Link link(string $title)
 */
class OptionsContainer extends BaseComponent
{
    use AutoCallAddComponent;

    public function addOption(BaseOption $option)
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
        return 'AntdAdmin\\Component\\Table\ColumnType\\OptionType\\';
    }
}
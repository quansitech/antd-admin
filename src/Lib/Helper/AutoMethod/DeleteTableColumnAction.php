<?php

namespace AntdAdmin\Lib\Helper\AutoMethod;

use AntdAdmin\Component\Table\ColumnType\ActionsContainer;

class DeleteTableColumnAction extends BaseHelper
{
    public function handle()
    {
        ActionsContainer::registerHelperMethod('delete', function (ActionsContainer $container) {
            $button = $container->link('删除');

            return $button->setDanger(true)
                ->request('delete', U('delete', ['ids' => '__id__']), null, null, '确认删除？');
        });
    }
}
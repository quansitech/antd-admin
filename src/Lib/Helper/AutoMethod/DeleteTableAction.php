<?php

namespace AntdAdmin\Lib\Helper\AutoMethod;

use AntdAdmin\Component\Table\ActionsContainer;

class DeleteTableAction extends BaseHelper
{
    public function handle()
    {
        ActionsContainer::registerHelperMethod('delete', function (ActionsContainer $container) {
            $button = $container->button('删除');

            return $button->relateSelection()
                ->setProps(['danger' => true])
                ->request('post', U('delete'), ['ids' => '__id__'], null, '确认删除？');
        });
    }
}
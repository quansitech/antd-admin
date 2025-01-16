<?php

namespace AntdAdmin\Lib\Helper\AutoMethod;

use AntdAdmin\Component\Table\ActionsContainer;

class ForbidTableAction extends BaseHelper
{
    public function handle()
    {
        ActionsContainer::registerHelperMethod('forbid', function (ActionsContainer $container) {
            $button = $container->button('禁用');

            return $button->relateSelection()->request('put', U('forbid'), ['ids' => '__id__']);
        });

        ActionsContainer::registerHelperMethod('resume', function (ActionsContainer $container) {
            $button = $container->button('启用');

            return $button->relateSelection()->request('put', U('resume'), ['ids' => '__id__']);
        });
    }
}
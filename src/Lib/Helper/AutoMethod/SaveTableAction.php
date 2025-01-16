<?php

namespace AntdAdmin\Lib\Helper\AutoMethod;

use AntdAdmin\Component\Table\ActionsContainer;

class SaveTableAction extends BaseHelper
{
    public function handle()
    {
        ActionsContainer::registerHelperMethod('editSave', function (ActionsContainer $container) {
            $button = $container->startEditable('编辑');

            return $button->saveRequest('put', U('save'));
        });
    }
}
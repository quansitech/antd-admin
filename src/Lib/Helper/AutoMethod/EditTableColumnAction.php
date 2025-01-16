<?php

namespace AntdAdmin\Lib\Helper\AutoMethod;

use AntdAdmin\Component\Modal\Modal;
use AntdAdmin\Component\Table\ColumnType\ActionsContainer;

class EditTableColumnAction extends BaseHelper
{
    public function handle()
    {
        ActionsContainer::registerHelperMethod('edit', function (ActionsContainer $container, $type = 'modal') {
            $button = $container->link('编辑');

            switch ($type) {
                case 'modal':
                    $modal = new Modal();
                    $modal->setTitle('编辑')
                        ->setWidth('800px')
                        ->setUrl(U('edit', ['id' => '__id__']));
                    $button->modal($modal);
                    break;
                case 'link':
                    $button->link(U('edit', ['id' => '__id__']));
                    break;
            }

            return $button;
        });
    }
}
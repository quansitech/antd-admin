<?php

namespace AntdAdmin\Lib\Helper\AutoMethod;

use AntdAdmin\Component\Modal\Modal;
use AntdAdmin\Component\Table\ActionsContainer;

class AddNewTableAction extends BaseHelper
{
    public function handle()
    {
        ActionsContainer::registerHelperMethod('addNew', function (ActionsContainer $container, $type = 'modal') {
            $button = $container->button('新增')->setProps([
                'type' => 'primary'
            ]);


            switch ($type) {
                case 'modal':
                    $modal = new Modal();
                    $modal->setTitle('新增')
                        ->setWidth('800px')
                        ->setUrl(U('add'));
                    $button->modal($modal);
                    break;
                case 'link':
                    $button->link(U('add'));
                    break;
            }

            return $button;
        });
    }
}
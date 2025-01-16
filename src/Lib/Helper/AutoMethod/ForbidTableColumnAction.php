<?php

namespace AntdAdmin\Lib\Helper\AutoMethod;

use AntdAdmin\Component\Table\ColumnType\ActionsContainer;
use Gy_Library\DBCont;

class ForbidTableColumnAction extends BaseHelper
{
    public function handle()
    {
        ActionsContainer::registerHelperMethod('forbid', function (ActionsContainer $container) {
            $forbid_button = $container->link('禁用')
                ->setShowCondition('status', '=', DBCont::NORMAL_STATUS)
                ->request('put', U('forbid'), ['ids' => '__id__'], null, '确认禁用？');
            $resume_button = $container->link('启用')
                ->setShowCondition('status', '=', DBCont::FORBIDDEN_STATUS)
                ->request('put', U('forbid'), ['ids' => '__id__'], null, '确认启用？');

            return [
                $forbid_button,
                $resume_button
            ];
        });
    }
}
<?php

namespace AntdAdmin\Lib\Adapter;

use AntdAdmin\Component\Table\Pagination;
use Qscmf\Core\QsPage;

class QsPage2Pagination
{
    public static function render(QsPage $page)
    {
        return new Pagination($page->nowPage, $page->listRows, $page->totalRows, C('VAR_PAGE'));
    }

}
<?php

namespace AntdAdmin\Lib\Adapter;

use AntdAdmin\Component\Table\Pagination;
use Qscmf\Core\QsPage;

class QsPage2Pagination extends Pagination
{
    public function __construct(QsPage $page)
    {

        $this->setCurrent($page->nowPage);
        $this->setPageSize($page->listRows);
        $this->setTotal($page->totalRows);
        $this->setParamName(C('VAR_PAGE'));
    }
}
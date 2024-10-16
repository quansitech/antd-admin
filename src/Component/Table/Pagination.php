<?php

namespace AntdAdmin\Component\Table;

use AntdAdmin\Component\BaseComponent;

class Pagination extends BaseComponent
{
    protected $render_data = [
        'current' => 1,
        'pageSize' => 10,
        'total' => 0,
        'showSizeChanger' => false,
        'showQuickJumper' => false,

        'paramName' => 'page',
    ];

    public function __construct($current, $pageSize, $total, $paramName = 'page')
    {
        $this->setCurrent($current);
        $this->setPageSize($pageSize);
        $this->setTotal($total);
        $this->setParamName($paramName);
    }

    public function setCurrent(int $current)
    {
        $this->render_data['current'] = $current;
    }

    public function setPageSize(int $pageSize)
    {
        $this->render_data['pageSize'] = $pageSize;
    }

    public function setTotal(int $total)
    {
        $this->render_data['total'] = $total;
    }

    public function setShowSizeChanger(bool $showSizeChanger)
    {
        $this->render_data['showSizeChanger'] = $showSizeChanger;
    }

    public function setShowQuickJumper(bool $showQuickJumper)
    {
        $this->render_data['showQuickJumper'] = $showQuickJumper;
    }

    public function setParamName(string $paramName)
    {
        $this->render_data['paramName'] = $paramName;
    }
}
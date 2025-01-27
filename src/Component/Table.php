<?php

namespace AntdAdmin\Component;

use AntdAdmin\Component\Modal\ModalPropsInterface;
use AntdAdmin\Component\Table\ActionsContainer;
use AntdAdmin\Component\Table\ColumnsContainer;
use AntdAdmin\Component\Table\Pagination;
use AntdAdmin\Component\Tabs\PaneInterface;
use AntdAdmin\Component\Traits\HasContainer;

/**
 * @method $this setSearch(boolean $search) 设置是否显示搜索框
 * @method $this setExtraRenderValues(array $values) 设置额外渲染值
 * @method $this setExpandable(array $expandable) 设置树形展开属性
 * @method $this setAjaxRequest(boolean $ajaxRequest) 设置是否使用ajax请求
 */
class Table extends BaseComponent implements PaneInterface, ModalPropsInterface
{
    use PageComponent {
        render as pageRender;
    }
    use HasContainer;

    public function __construct()
    {
        $columnsContainer = new ColumnsContainer();
        $columnsContainer->setTable($this);

        $actionsContainer = new ActionsContainer();
        $actionsContainer->setTable($this);

        $this->render_data['type'] = 'table';
        $this->render_data['columns'] = $columnsContainer;
        $this->render_data['actions'] = $actionsContainer;
        $this->render_data['rowKey'] = 'id';
        $this->render_data['searchUrl'] = '';
        $this->render_data['extraRenderValues'] = [];
        $this->render_data['pagination'] = false;
    }


    /**
     * 设置搜索地址
     * @param string $url
     * @return Table
     */
    public function setSearchUrl(string $url)
    {
        $this->render_data['searchUrl'] = $url;
        return $this;
    }

    public function setRowSelection($rowSelection)
    {
        $this->render_data['rowSelection'] = $rowSelection;
        return $this;
    }

    /**
     * 设置列
     * @param $callback callable
     * @return Table
     * @throws \Exception
     */
    public function columns(callable $callback): static
    {
        $this->handleContainer('columns', $callback);
        return $this;
    }

    /**
     * 设置操作
     * @param $callback
     * @return $this
     * @throws \Exception
     */
    public function actions($callback)
    {
        $this->handleContainer('actions', $callback);
        return $this;
    }

    protected function getPageComponent()
    {
        return 'Admin/Table';
    }

    /**
     * 设置数据源
     * @param $data_source array
     * @return Table
     */
    public function setDataSource($data_source)
    {
        $this->render_data['dataSource'] = $data_source;
        return $this;
    }

    /**
     * 设置分页
     * @param Pagination|false $pagination
     * @return $this
     */
    public function setPagination(Pagination|false $pagination)
    {
        $this->render_data['pagination'] = $pagination;
        return $this;
    }

    public function setRowKey($key)
    {
        $this->render_data['rowKey'] = $key;
        return $this;
    }

    public function setDefaultSearchValue($value)
    {
        $this->render_data['defaultSearchValue'] = $value;
        return $this;
    }

    public function setDateFormatter(string $formatter)
    {
        $this->render_data['dateFormatter'] = $formatter;
        return $this;
    }

    public function getTabPaneComponent(): string
    {
        return 'table';
    }

    public function getTabPaneProps(): array
    {
        return $this->pageRender(false);
    }

    public function getModalProps()
    {
        return $this->pageRender(false);
    }

    public function render($showView = true)
    {
        if ($this->isSearchRequest()) {
            header('Content-Type: application/json');
            $this->render_data['columns']->render();
            $pagination = $this->render_data['pagination'];
            qs_exit(json_encode([
                'dataSource' => $this->render_data['dataSource'],
                'pagination' => $pagination ? $pagination->render() : false,
                'extraRenderValues' => $this->render_data['extraRenderValues'],
            ]));
        }
        return $this->pageRender($showView);
    }

    protected function isSearchRequest()
    {
        $headers = getallheaders();
        return $headers['X-Table-Search'] ?? false;
    }

    public function getDataSource()
    {
        return $this->render_data['dataSource'];
    }

    public function getExtraRenderValues()
    {
        return $this->render_data['extraRenderValues'];
    }
}
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
 */
class Table extends BaseComponent implements PaneInterface, ModalPropsInterface
{
    use PageComponent {
        render as pageRender;
    }
    use HasContainer;

    public function __construct()
    {
        $this->render_data['columns'] = new ColumnsContainer();
        $this->render_data['actions'] = new ActionsContainer();
        $this->render_data['rowKey'] = 'id';
        $this->render_data['searchUrl'] = U('');
    }


    /**
     * 设置表格滚动
     * @htmlpath https://ant.design/components/table-cn#scroll
     * @param ?bool $scrollToFirstRowOnChange 数据变更时是否滚动到第一行
     * @param ?string $x 宽度
     * @param ?string $y 高度
     * @return $this
     */
    public function setScroll(bool $scrollToFirstRowOnChange = null, string $x = null, string $y = null): static
    {
        $this->render_data['scroll'] = [
            'scrollToFirstRowOnChange' => $scrollToFirstRowOnChange,
            'x' => $x,
            'y' => $y
        ];
        return $this;
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
     * @throws \ReflectionException
     * @throws \Think\Exception
     */
    public function columns(callable $callback): static
    {
        $this->handleContainer('columns', $callback);
        return $this;
    }

    public function actions($callback)
    {
        $this->handleContainer('actions', $callback);
        return $this;
    }

    protected function getComponentName()
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

    public function setPagination(Pagination $pagination)
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
            qs_exit(json_encode([
                'dataSource' => $this->render_data['dataSource'],
                'pagination' => $this->render_data['pagination']?->render(),
            ]));
        }
        return $this->pageRender($showView);
    }

    protected function isSearchRequest()
    {
        $headers = getallheaders();
        return $headers['X-Table-Search'] ?? false;
    }
}
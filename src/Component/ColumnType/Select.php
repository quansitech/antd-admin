<?php

namespace AntdAdmin\Component\ColumnType;

use AntdAdmin\Component\Traits\HasValueEnum;

class Select extends BaseColumn
{
    use HasValueEnum;

    protected function getValueType(): string
    {
        return 'select';
    }

    /**
     * 设置显示搜索功能
     * @return $this
     */
    public function showSearch(): static
    {
        $this->render_data['fieldProps']['showSearch'] = true;

        return $this;
    }

    /**
     * 设置搜索地址
     * 搜索接口：
     *  参数: keyWords=[关键词]
     *  响应: {label: [显示内容], value: [值]}[]
     * @param string $url
     * @return $this
     */
    public function setSearchUrl(string $url): static
    {
        $this->showSearch();
        $this->render_data['fieldProps']['searchUrl'] = $url;
        return $this;
    }
}
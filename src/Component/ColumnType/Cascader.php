<?php

namespace AntdAdmin\Component\ColumnType;

class Cascader extends BaseColumn
{
    protected function getValueType(): string
    {
        return 'cascader';
    }

    /**
     * 设置选项
     * @see https://ant.design/components/cascader-cn#option
     * @param $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->render_data['fieldProps']['options'] = $options;
        return $this;
    }

    /**
     * 设置加载数据url
     * 请求方式：GET
     * 请求参数： {"selected": "值1", "value": "【初始值】"}
     * 响应参数：[
     *  {"label": "示例1", "value": "值1", "isLeaf": false},
     *  {"label": "示例2", "value": "值2"}
     * ]
     * isLeaf：默认为true，表示叶子节点
     *
     * @param $url
     * @return $this
     */
    public function setLoadDataUrl($url)
    {
        $this->render_data['fieldProps']['loadDataUrl'] = $url;
        return $this;
    }
}
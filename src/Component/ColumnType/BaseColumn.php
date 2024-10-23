<?php

namespace AntdAdmin\Component\ColumnType;

use AntdAdmin\Component\BaseComponent;
use AntdAdmin\Component\ColumnType\RuleType\BaseRule;

/**
 *
 * @method self setFormItemProps($props) 设置表单项属性
 * @method self setSearch($search) 设置搜索选项，表格列无效
 * @method self setWidth($width) 设置列宽 表单宽度请使用setFormItemWidth
 * @method self setFixed(string $fixed) 设置列固定 left right
 * @method self setFieldProps($props) 设置搜索/表单项组件的属性
 */
abstract class BaseColumn extends BaseComponent
{
    abstract protected function getValueType(): string;

    public function afterFormAdd()
    {
        $this->setFormItemWidth(8);
    }

    public function __construct($dataIndex, $title)
    {
        $this->render_data = [
            'dataIndex' => $dataIndex,
            'title' => $title,
            'valueType' => $this->getValueType(),
            'formItemProps' => [
                'rules' => []
            ],
        ];
    }

    /**
     * 设置宽度
     * @param int $md
     * @param int $xs
     * @return $this
     */
    public function setFormItemWidth(int $md, int $xs = 24)
    {
        $this->render_data['colProps']['md'] = $md;
        $this->render_data['colProps']['xs'] = $xs;
        return $this;
    }

    /**
     * 设置是否可编辑, 表单项无效
     * @param bool $editable
     * @return $this
     */
    public function editable(bool $editable = true)
    {
        $this->render_data['editable'] = $editable;
        return $this;
    }

    /**
     * 隐藏表格列
     * @return $this
     */
    public function hideInTable()
    {
        $this->render_data['hideInTable'] = true;
        return $this;
    }

    /**
     * 隐藏表半项
     * @return $this
     */
    public function hideInForm()
    {
        $this->render_data['hideInForm'] = true;
        return $this;
    }

    /**
     * 添加校验规则
     * @param BaseRule $rule
     * @return $this
     */
    public function addRule(BaseRule $rule)
    {
        $this->render_data['formItemProps']['rules'][] = $rule->render();
        return $this;
    }


    /**
     * 设置提示信息，为方便使用提供此方法
     * @param $tips
     * @return $this
     */
    public function setTips($tips)
    {
        $this->render_data['formItemProps']['extra'] = $tips;
        return $this;
    }

}
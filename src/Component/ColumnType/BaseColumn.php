<?php

namespace AntdAdmin\Component\ColumnType;

use AntdAdmin\Component\BaseComponent;
use AntdAdmin\Component\ColumnType\RuleType\BaseRule;
use AntdAdmin\Component\Form;
use AntdAdmin\Component\Table;

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
    protected Form|null $form = null;
    protected Table|null $table = null;

    abstract protected function getValueType(): string;

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

    protected function beforeAddForm()
    {
        $this->setFormItemWidth(8);
    }

    public function setForm(Form $form): void
    {
        $this->beforeAddForm();
        $this->form = $form;
    }

    protected function beforeAddTable()
    {
        $this->editable(false);
        $this->setWidth(100);
    }

    public function setTable(Table $table)
    {
        $this->beforeAddTable();
        $this->table = $table;
    }

    /**
     * 设置只读，表格列无效
     * @return $this
     */
    public function readonly()
    {
        $this->render_data['readonly'] = true;
        return $this;
    }

    public function render()
    {
        if (in_array(HasExtraDataRender::class, class_uses_recursive($this))) {
            if ($this->form) {
                $extraValues = $this->form->getExtraRenderValues();
                $initialValue = $this->form->getInitialValues()[$this->render_data['dataIndex']] ?? '';
                $extraValues[$this->render_data['dataIndex']] = $this->getExtraRenderValue($initialValue);
                $this->form->setExtraRenderValues($extraValues);
            }
            if ($this->table) {
                $extraValues = $this->table->getExtraRenderValues();
                foreach ($this->table->getDataSource() as $i => $item) {
                    if (!isset($extraValues[$i])) {
                        $extraValues[$i] = [];
                    }
                    $extraValues[$i][$this->render_data['dataIndex']] = $this->getExtraRenderValue($item[$this->render_data['dataIndex']]);
                }

                $this->table->setExtraRenderValues($extraValues);
            }
        }
        return parent::render();
    }

}
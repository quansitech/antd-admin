<?php

namespace AntdAdmin\Component\Table\ActionType;

use AntdAdmin\Component\Traits\HasModalAction;
use AntdAdmin\Component\Traits\HasRequestAction;

class Button extends BaseAction
{
    use HasRequestAction, HasModalAction;

    protected function getType()
    {
        return 'button';
    }


    /**
     * 设置按钮属性 {type: primary|default, danger: true|false}
     * @see https://ant.design/components/button-cn#api
     * @param array $props
     * @return $this
     */
    public function setProps(array $props)
    {
        $this->render_data['props'] = $props;
        return $this;
    }

    protected function getConflictPropAttributes(): array
    {
        return [
            'link',
            'request',
        ];
    }

    public function link($url)
    {
        $this->render_data['link'] = [
            'url' => $url
        ];
        return $this;
    }


    /**
     * 关联选择
     * 请求时会加入 selection 参数，值为当前选中的 Key
     * @return $this
     */
    public function relateSelection()
    {
        $this->render_data['relateSelection'] = true;
        return $this;
    }

    public function render()
    {
        if ($this->render_data['relateSelection']) {
            $this->table->setRowSelection(true);
        }
        return parent::render();
    }
}
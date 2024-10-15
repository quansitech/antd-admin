<?php

namespace AntdAdmin\Component\Form\ActionType;

use AntdAdmin\Component\Traits\HasModalAction;
use AntdAdmin\Component\Traits\HasRequestAction;


class Button extends BaseAction
{
    use HasRequestAction, HasModalAction;

    protected function getConflictPropAttributes(): array
    {
        return [
            'submit',
            'link',
            'reset',
            'request',
            'back',
        ];
    }

    protected function getType(): string
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

    /**
     * 跳转链接
     * @param $url
     * @return $this
     */
    public function link($url)
    {
        $this->render_data['link'] = [
            'url' => $url
        ];
        return $this;
    }

    /**
     * 提交表单
     * @param $method
     * @param $url
     * @param $data
     * @param $confirm
     * @param $afterAction
     * @return $this
     */
    public function submit($method, $url, $data = null, $confirm = '', $afterAction = [self::AFTER_ACTION_CLOSE_MODAL, self::AFTER_ACTION_TABLE_RELOAD])
    {
        $this->render_data['submit'] = [
            'method' => $method,
            'url' => $url,
            'data' => $data,
            'confirm' => $confirm,
            'afterAction' => $afterAction,
        ];
        return $this;
    }

    /**
     * 重置表单
     * @return $this
     */
    public function reset()
    {
        $this->render_data['reset'] = true;
        return $this;
    }

    /**
     * 返回上一页
     * @return $this
     */
    public function back()
    {
        $this->render_data['back'] = true;
        return $this;
    }
}
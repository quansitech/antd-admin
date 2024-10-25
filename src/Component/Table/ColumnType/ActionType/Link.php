<?php

namespace AntdAdmin\Component\Table\ColumnType\ActionType;

use AntdAdmin\Component\Traits\HasModalAction;
use AntdAdmin\Component\Traits\HasRequestAction;

/**
 * @method $this setDanger($danger) 设置是否为危险按钮
 */
class Link extends BaseAction
{
    use HasRequestAction, HasModalAction;

    /**
     * 设置链接地址
     * @param $href
     * @return $this
     */
    public function setHref($href)
    {
        $this->render_data['href'] = $href;
        return $this;
    }

    protected function getType()
    {
        return 'link';
    }

    public function modalByField($field)
    {
        $this->render_data['modalByField'] = $field;
        return $this;
    }
}
<?php

namespace AntdAdmin\Component\Table\ColumnType\OptionType;

use AntdAdmin\Component\Traits\HasModalAction;
use AntdAdmin\Component\Traits\HasRequestAction;

/**
 * @method $this setDanger($danger) 设置是否为危险按钮
 */
class Link extends BaseOption
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
}
<?php

namespace AntdAdmin\Component\Traits;

trait HasBadge
{

    /**
     * 设置角标
     * @param string|int|float $badge
     * @return $this
     */
    public function setBadge(string|int|float $badge)
    {
        $this->render_data['badge'] = $badge;
        return $this;
    }
}
<?php

namespace AntdAdmin\Component\Traits;

trait HasRequestAction
{
    /** @var string 关闭弹窗 */
    const AFTER_ACTION_CLOSE_MODAL = 'closeModal';

    /** @var string 刷新列表 */
    const AFTER_ACTION_TABLE_RELOAD = 'tableReload';

    public function request($method, $url, $data = null, $headers = null, $confirm = '', $afterAction = [self::AFTER_ACTION_CLOSE_MODAL, self::AFTER_ACTION_TABLE_RELOAD])
    {
        $this->render_data['request'] = [
            'method' => $method,
            'url' => $url,
            'data' => $data,
            'headers' => $headers,
            'confirm' => $confirm,
            'afterAction' => $afterAction,
        ];
        return $this;
    }
}
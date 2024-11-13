<?php

namespace AntdAdmin\Component\Table\ActionType;


class StartEditable extends BaseAction
{

    protected function getType()
    {
        return 'startEditable';
    }

    public function setProps(array $props)
    {
        $this->render_data['props'] = $props;
        return $this;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array|null $data
     * @return $this
     */
    public function saveRequest(string $method, string $url, array $data = null)
    {
        $this->render_data['saveRequest'] = [
            'method' => $method,
            'url' => $url,
            'data' => $data,
        ];
        return $this;
    }
}
<?php

namespace AntdAdmin\Component\ColumnType;

class Link extends BaseColumn
{

    public function __construct($dataIndex, $title)
    {
        parent::__construct($dataIndex, $title);
        $this->render_data['fieldProps'] = [
            'href' => ''
        ];
    }

    protected function getValueType(): string
    {
        return 'link';
    }

    public function setHref(string $url)
    {
        $this->render_data['fieldProps']['href'] = $url;
    }
}
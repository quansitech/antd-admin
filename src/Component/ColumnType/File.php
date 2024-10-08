<?php

namespace AntdAdmin\Component\ColumnType;

class File extends BaseColumn
{

    public function __construct($dataIndex, $title)
    {
        parent::__construct($dataIndex, $title);
    }

    protected function getValueType(): string
    {
        return 'file';
    }

    /**
     * 设置上传请求
     * @param $policyGetUrl string
     * @return $this
     */
    public function setUploadRequest($policyGetUrl)
    {
        $this->render_data['fieldProps']['uploadRequest'] = [
            'policyGetUrl' => $policyGetUrl,
        ];
        return $this;
    }

    public function setMaxCount(int $count)
    {
        $this->render_data['fieldProps']['maxCount'] = $count;
        return $this;
    }

    public function render()
    {
        if (!isset($this->render_data['fieldProps']['loadUrl'])) {
            $this->render_data['fieldProps']['loadUrl'] = U('Antd/Upload/fileInfo');
        }
        return parent::render();
    }
}
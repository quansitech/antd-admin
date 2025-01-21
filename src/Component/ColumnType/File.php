<?php

namespace AntdAdmin\Component\ColumnType;

class File extends BaseColumn
{
    use HasExtraDataRender;

    protected $showFileUrlByIdCallback = null;

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
        if (!isset($this->render_data['fieldProps']['uploadRequest'])) {
            $this->render_data['fieldProps']['uploadRequest'] = [
                'policyGetUrl' => U('api/upload/upload', ['cate' => 'file']),
            ];
        }
        return parent::render();
    }

    /**
     * 设置获取文件url的回调
     * @param $callback
     * @return self
     */
    public function setShowFileUrlById($callback)
    {
        if (!is_callable($callback)) {
            throw new \Exception('回调必须为callable');
        }

        $this->showFileUrlByIdCallback = $callback;
        return $this;
    }

    protected function getExtraRenderValue(mixed $value)
    {
        if (!$value) {
            return [];
        }
        $value = explode(',', $value);
        $res = [];
        foreach ($value as $id) {
            $ent = D('FilePic')->where(['id' => $id])->find();
            $res[] = [
                'id' => $id,
                'name' => $ent['title'],
                'hash_id' => $ent['hash_id'],
                'url' => $this->showFileUrlByIdCallback
                    ? $this->showFileUrlByIdCallback($id)
                    : showFileUrl($id),
            ];
        }

        return $res;
    }

}
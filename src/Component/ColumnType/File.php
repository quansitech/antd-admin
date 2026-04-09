<?php

namespace AntdAdmin\Component\ColumnType;

use Illuminate\Database\Capsule\Manager as DB;

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

    protected function beforeAddTable(){
        parent::beforeAddTable();

        $this->setSearch(false);
    }

    protected function getExtraRenderValue(mixed $value)
    {
        if (!$value) {
            return [];
        }
        $ids = explode(',', $value);
        $entities = DB::table('file_pic')->whereIn('id', $ids)->get()->keyBy('id');

        $res = [];
        foreach ($ids as $id) {
            $ent = $entities[$id] ?? null;
            if (!$ent) {
                continue;
            }
            $res[] = [
                'id' => $id,
                'name' => $ent->title,
                'hash_id' => $ent->hash_id,
                'url' => $this->showFileUrlByIdCallback
                    ? $this->showFileUrlByIdCallback($id)
                    : showFileUrl($id),
            ];
        }

        return $res;
    }

}
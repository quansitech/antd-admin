<?php

namespace AntdAdmin\Controller;

use Think\Controller;

class UploadController extends Controller
{
    public function fileInfo($ids)
    {
        $ids = explode(',', $ids);
        $res = [];
        foreach ($ids as $id) {
            $ent = D('FilePic')->where(['id' => $id])->find();
            $res[] = [
                'id' => $id,
                'name' => $ent['title'],
                'hash_id' => $ent['hash_id'],
                'url' => showFileUrl($id),
            ];
        }

        $this->ajaxReturn($res);
    }
}
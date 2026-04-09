<?php

namespace AntdAdmin\Controller;

use AntdAdmin\Component\ColumnType\Area;
use Illuminate\Database\Capsule\Manager as DB;
use Think\Controller;

class AreaController extends Controller
{
    public function forCascader()
    {
        $maxLevel = I('maxLevel', 3);
        $selected = I('selected');
        $value = I('value');
        if ($value){
            $this->handleValue($value);
            return;
        }

        // 获取所有子节点
        $field = 'id as value,cname as label,level';
        if (!$selected) {
            $map['level'] = 1;
        } else {
            $map['upid'] = $selected;
        }
        $rows = DB::table('area')->where($map)->selectRaw($field)->get();

        $childCounts = DB::table('area')
            ->selectRaw('upid, count(*) as cnt')
            ->whereIn('upid', $rows->pluck('value')->all())
            ->groupBy('upid')
            ->pluck('cnt', 'upid');

        foreach ($rows as $row) {
            $row->isLeaf = $row->level >= $maxLevel || empty($childCounts[$row->value]);
        }
        $this->ajaxReturn($rows->all());
    }

    protected function handleValue($value)
    {
        $area = new Area('area', 'area');
        $options = $area->getParentOptionsToValue($value);

        $this->ajaxReturn($options);
    }
}
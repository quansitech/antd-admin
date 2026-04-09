<?php

namespace AntdAdmin\Component\ColumnType;

use Illuminate\Database\Capsule\Manager as DB;

class Area extends Cascader
{
    use HasExtraDataRender;

    protected $maxLevel = null;

    public function __construct($dataIndex, $title)
    {
        parent::__construct($dataIndex, $title);
    }

    /**
     * 设置最大级数 省 1，市 2，县 3
     * @param $level
     * @return $this
     */
    public function setMaxLevel($level)
    {
        $this->maxLevel = $level;
        return $this;
    }

    public function render()
    {
        if (!isset($this->render_data['fieldProps']['loadDataUrl'])) {
            $this->setLoadDataUrl(U('Antd/Area/forCascader', ['maxLevel' => $this->maxLevel]));
        }
        return parent::render();
    }

    protected function getExtraRenderValue(mixed $value)
    {
        if (!$value) {
            return null;
        }
        $options = $this->getParentOptionsToValue($value);

        return [
            'options' => $options,
        ];
    }


    public function getParentOptionsToValue($value, $children = [])
    {
        $area = DB::table('area')->where('id', $value)->first();
        if (!$area || $area->level == 0) {
            return $children;
        }
        $map['upid'] = $area->upid;
        $rows = DB::table('area')->where($map)->selectRaw('id as value,cname as label,level')->get();

        $childCounts = DB::table('area')
            ->selectRaw('upid, count(*) as cnt')
            ->whereIn('upid', $rows->pluck('value')->all())
            ->groupBy('upid')
            ->pluck('cnt', 'upid');

        foreach ($rows as $row) {
            if ($row->value == $value) {
                $row->children = $children;
            }
            $row->isLeaf = ($this->maxLevel ?: 3) <= $row->level || empty($childCounts[$row->value]);
        }
        return $this->getParentOptionsToValue($area->upid, $rows->all());
    }
}
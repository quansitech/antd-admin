<?php

namespace AntdAdmin\Component;

use AntdAdmin\Lib\Renderable;
use Illuminate\Support\Str;

abstract class BaseComponent implements Renderable
{
    protected $render_data = [];

    public function render()
    {
        $this->checkConflictPropAttributes();

        foreach ($this->render_data as $key => $value) {
            if ($value instanceof Renderable) {
                $this->render_data[$key] = $value->render();
            }
        }
        return $this->toArray();
    }

    public function toArray()
    {
        return $this->render_data;
    }

    protected function getConflictPropAttributes(): array
    {
        return [];
    }

    protected function checkConflictPropAttributes()
    {
        $conflict_prop_attributes = $this->getConflictPropAttributes();
        for ($i = 0; $i < count($conflict_prop_attributes); $i++) {
            for ($j = $i + 1; $j < count($conflict_prop_attributes); $j++) {
                if (isset($this->render_data[$conflict_prop_attributes[$i]]) && isset($this->render_data[$conflict_prop_attributes[$j]])) {
                    E(get_class($this) . ' 属性错误：' . $conflict_prop_attributes[$i] . ' 和 ' . $conflict_prop_attributes[$j] . ' 不能同时设置');
                }
            }
        }
    }


    public function __call(string $name, array $arguments)
    {
        if (Str::startsWith($name, 'set')) {
            $name = Str::camel(substr($name, 3));
            $this->render_data[$name] = $arguments[0];
            return $this;
        }
        throw new \Exception($name . ' method not exists');
    }
}
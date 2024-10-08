<?php

namespace AntdAdmin\Component\Traits;

use AntdAdmin\Component\ColumnType\RuleType\BaseRule;

trait HasShowRules
{

    /**
     * 设置显示规则
     * @param string $field
     * @param BaseRule[] $rules
     * @return $this
     */
    public function addShowRules($field, array $rules): static
    {
        if (!isset($this->render_data['showRules'][$field])) {
            $this->render_data['showRules'][$field] = [];
        }
        foreach ($rules as $rule) {
            $this->render_data['showRules'][$field][] = $rule->render();
        }
        return $this;
    }
}
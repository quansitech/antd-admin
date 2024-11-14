<?php

namespace AntdAdmin\Component\Traits;

trait HasShowCondition
{
    public function setShowCondition($field, $operator, $value)
    {
        $this->render_data['showCondition'] = [
            'field' => $field,
            'operator' => $operator,
            'value' => $value,
        ];
        return $this;
    }
}
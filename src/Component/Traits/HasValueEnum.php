<?php

namespace AntdAdmin\Component\Traits;

trait HasValueEnum
{
    /**
     * 设置展示枚举值
     * @param array $valueEnum
     * @return $this
     * @example [1 => '启用', 0 => '禁用']
     * @example ['1' => ['text'=>'启用', 'status'=>'Success'], '0' => ['text'=>'禁用', 'status'=>'Error']]
     * 其中 status 的值有 Success, Warning, Error, Default, Processing；但数据类型需要是字符串，且不能为数字。
     */
    public function setValueEnum(array $valueEnum): static
    {
        $this->render_data['valueEnum'] = $valueEnum;
        return $this;
    }
}

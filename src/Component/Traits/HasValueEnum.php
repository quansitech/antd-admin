<?php

namespace AntdAdmin\Component\Traits;

trait HasValueEnum
{
    /**
     * 设置展示枚举值
     * @param array $valueEnum
     * @return $this
     * @example [1 => '启用', 0 => '禁用']
     * @example [1 => ['text'=>'启用', 'status'=>'Success'], 0 => ['text'=>'禁用', 'status'=>'Error']]
     * 其中 status 的值有 Success, Warning, Error, Default, Processing。
     */
    public function setValueEnum($valueEnum): static
    {
        $this->render_data['valueEnum'] = $this->transformValueEnumToMap($valueEnum);
        return $this;
    }

    /**
     * 将 valueEnum 转为 map 结构，以便前端使用
     * @param $valueEnum
     * @return array|mixed
     */
    protected function transformValueEnumToMap($valueEnum)
    {
        if (empty($valueEnum)) return [];
        $res = [];
        if ($valueEnum == array_values($valueEnum)) {
            return $valueEnum;
        }

        foreach ($valueEnum as $key => $item) {
            $res[] = [$key, $item];
        }
        return $res;
    }
}

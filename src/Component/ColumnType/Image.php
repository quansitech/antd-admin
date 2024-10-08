<?php

namespace AntdAdmin\Component\ColumnType;

class Image extends File
{

    protected function getValueType(): string
    {
        return 'image';
    }

    /**
     * 设置裁剪
     * @param string $ratio 宽高比: 'width/height'
     * @return $this
     */
    public function setCrop(string $ratio)
    {
        $this->render_data['fieldProps']['crop'] = [
            'ratio' => $ratio,
        ];
        return $this;
    }
}
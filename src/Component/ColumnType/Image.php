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
     * @param float|null $quality 压缩质量: 0.1 ~ 1
     * @return $this
     */
    public function setCrop(string $ratio, float $quality = null)
    {
        $this->render_data['fieldProps']['crop'] = [
            'ratio' => $ratio,
            'quality' => $quality,
        ];
        return $this;
    }

    public function render()
    {
        if (!isset($this->render_data['fieldProps']['uploadRequest'])) {
            $this->render_data['fieldProps']['uploadRequest'] = [
                'policyGetUrl' => U('api/upload/upload', ['cate' => 'image']),
            ];
        }
        return parent::render();
    }
}
<?php

namespace AntdAdmin\Component\ColumnType;

trait HasExtraDataRender
{
    abstract protected function getExtraRenderValue(mixed $value);
}
<?php

namespace AntdAdmin\Component\Tabs;

interface PaneInterface
{
    public function getTabPaneComponent(): string;

    public function getTabPaneProps(): array;
}
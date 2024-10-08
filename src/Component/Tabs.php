<?php

namespace AntdAdmin\Component;

use AntdAdmin\Component\Tabs\PaneInterface;

/**
 * @method $this setDefaultActiveKey(string $key)
 */
class Tabs extends BaseComponent
{
    use PageComponent {
        render as parentRender;
    }

    protected function getComponentName()
    {
        return 'Admin/Tabs';
    }

    public function __construct()
    {
        $this->render_data['tabs'] = [];
    }

    public function addTab(string $key, string $title, PaneInterface $pane)
    {
        $this->render_data['tabs'][$key] = [
            'title' => $title,
            'pane' => [
                'component' => $pane->getTabPaneComponent(),
                'props' => $pane
            ],
        ];
        return $this;
    }

    public function render($showView = true)
    {
        foreach ($this->render_data['tabs'] as &$tab) {
            /** @var PaneInterface $pane */
            $pane = $tab['pane']['props'];
            $tab['pane']['props'] = $pane->getTabPaneProps();
        }
        return $this->parentRender($showView);
    }
}
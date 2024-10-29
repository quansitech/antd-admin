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

    protected function getPageComponent()
    {
        return 'Admin/Tabs';
    }

    public function __construct()
    {
        $this->render_data['type'] = 'tabs';
        $this->render_data['tabs'] = [];
    }

    public function addTab(string $key, string $title, PaneInterface $pane = null, string $url = '')
    {
        $tab = [
            'title' => $title,
        ];
        if ($url) {
            $tab['url'] = $url;
        }
        if ($pane) {
            $tab['pane'] = [
                'component' => $pane->getTabPaneComponent(),
                'props' => $pane
            ];
        }

        $this->render_data['tabs'][$key] = $tab;
        return $this;
    }

    public function render($showView = true)
    {
        foreach ($this->render_data['tabs'] as &$tab) {
            /** @var PaneInterface $pane */
            $pane = $tab['pane']['props'];
            if ($pane) {
                $tab['pane']['props'] = $pane->getTabPaneProps();
            }
        }
        return $this->parentRender($showView);
    }
}
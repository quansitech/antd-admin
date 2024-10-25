<?php

namespace AntdAdmin\Controller;

use Qscmf\Lib\Inertia\Inertia;

trait HasLayoutProps
{

    protected function handleLayoutProps()
    {
        if (IS_AJAX) {
            return;
        }

        if ($this->isInertia()) {
            return;
        }

        Inertia::getInstance()->share('layoutProps', [
            'title' => C('WEB_SITE_TITLE'),
            'menuList' => $this->getMenuList(),
            'topMenu' => $this->getTopMenu(),
            'topMenuActiveKey' => $this->top_menu_active_key,
            'menuActiveKey' => 'n-' . getNid(),
            'logo' => showFileUrl(C('CONFIG_WEBSITE_LOGO')),
            'userMenu' => C('ANTD_ADMIN_LAYOUT_PROPS.userMenu'),

            'enableNewLayout' => C('ANTD_ADMIN_NEW_LAYOUT'),
        ]);
    }

    protected function isInertia()
    {
        $headers = getallheaders();
        if ($headers['X-Inertia']) {
            return true;
        }
        return false;
    }

    protected function setActiveNid($nid)
    {
        Inertia::getInstance()->share('layoutProps.menuActiveKey', 'n-' . $nid);
    }

    private function getMenuList()
    {
        $menu = $this->menu_list;
        $res = [];
        foreach ($menu as $m) {
            $res[] = [
                'path' => $m['url'],
                'key' => 'm-' . $m['id'],
                'name' => $m['title'],
                'children' => $this->handleNodeList($m['node_list'])
            ];
        }
        return $res;
    }

    private function getTopMenu()
    {
        $menu = $this->top_menu;
        $res = [];
        foreach ($menu as $m) {
            $res[] = [
                'path' => $m['url'],
                'key' => $m['module'],
                'label' => $m['title'],
            ];
            if (strtolower($m['module']) == strtolower(MODULE_NAME)) {
                $this->top_menu_active_key = $m['module'];
            }
        }

        return $res;
    }

    private function handleNodeList(mixed $node_list)
    {
        $res = [];
        foreach ($node_list as $n) {
            $res[] = [
                'path' => $n['url'],
                'key' => 'n-' . $n['id'],
                'name' => $n['title'],
            ];
        }

        return $res;
    }
}
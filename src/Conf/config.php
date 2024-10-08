<?php

return [
    'ANTD_ADMIN_LAYOUT_PROPS' => [
        'userMenu' => [
            ['title' => '首页', 'url' => __ROOT__ . '/', 'type' => 'open'],
            ['title' => '修改资料', 'url' => __ROOT__ . '/Admin/User/editUser', 'type' => 'nav'],
            ['title' => '退出', 'url' => __ROOT__ . '/Admin/Public/logout', 'type' => 'ajax'],
        ]
    ]
];
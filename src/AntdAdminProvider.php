<?php

namespace AntdAdmin;

use AntdAdmin\Controller\AreaController;
use AntdAdmin\Lib\RegisterHelper;
use Bootstrap\Provider;
use Bootstrap\RegisterContainer;

class AntdAdminProvider implements Provider
{
    public function register()
    {
        $resources_path = realpath(WWW_DIR . '/../resources');

        RegisterContainer::registerController('Antd', 'Area', AreaController::class);

        $config = require_once __DIR__ . '/Conf/config.php';
        C($config);

        RegisterHelper::registerAutoMethod();
    }

}
<?php

namespace AntdAdmin;

use AntdAdmin\Controller\AreaController;
use AntdAdmin\Controller\UploadController;
use Bootstrap\Provider;
use Bootstrap\RegisterContainer;

class AntdAdminProvider implements Provider
{
    public function register()
    {
        $resources_path = realpath(WWW_DIR . '/../resources');
        RegisterContainer::registerSymLink($resources_path . '/js/backend/Pages/Admin', __DIR__ . '/../resourses/js/Pages/Admin');

        RegisterContainer::registerController('Antd', 'Upload', UploadController::class);
        RegisterContainer::registerController('Antd', 'Area', AreaController::class);

        $config = require_once __DIR__ . '/Conf/config.php';
        C($config);
    }

}
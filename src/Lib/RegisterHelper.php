<?php

namespace AntdAdmin\Lib;

use AntdAdmin\Lib\Helper\AutoMethod\BaseHelper;

class RegisterHelper
{
    public static function registerAutoMethod()
    {
        $classes = self::getClassFromDir(__DIR__ . '/Helper/AutoMethod', '\AntdAdmin\Lib\Helper\AutoMethod');
        foreach ($classes as $class) {
            /** @var BaseHelper $helper */
            $helper = new $class();

            $helper->handle();
        }
    }


    protected static function getClassFromDir(string $path, string $namespace)
    {
        $classes = [];
        if (is_dir($path)) {
            $files = scandir($path);
            foreach ($files as $file) {
                if ($file == '.' || $file == '..') {
                    continue;
                }
                $filePath = $path . '/' . $file;
                if (is_dir($filePath)) {
                    $classes = array_merge($classes, self::getClassFromDir($filePath, $namespace . '\\' . $file));
                } elseif (is_file($filePath) && substr($filePath, -4) == '.php') {
                    $cls = $namespace . '\\' . substr($file, 0, -4);
                    if (class_exists($cls) && !(new \ReflectionClass($cls))->isAbstract()) {
                        $classes[] = $cls;
                    }
                }
            }
        }
        return $classes;
    }
}

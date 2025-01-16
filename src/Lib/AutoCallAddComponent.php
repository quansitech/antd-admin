<?php

namespace AntdAdmin\Lib;

trait AutoCallAddComponent
{
    abstract protected function getCallMethod(): string;

    abstract protected function getNamespace(): string|array;

    protected static $_helper_methods = [];

    public function __call(string $name, array $arguments)
    {
        if (isset(self::$_helper_methods[$name])) {
            return call_user_func_array(self::$_helper_methods[$name], [$this, ...$arguments]);
        }

        $class = $this->resoleClass($name);
        return call_user_func([$this, $this->getCallMethod()], new $class(...$arguments));
    }

    private function resoleClass(string $name)
    {
        $namespace = $this->getNamespace();
        if (!is_array($namespace)) {
            $namespace = [$namespace];
        }
        foreach ($namespace as $item) {
            $class = $item . ucfirst($name);
            if (class_exists($class)) {
                return $class;
            }
        }
        throw new \Exception('column type: ' . $name . ' error');
    }

    public static function registerHelperMethod($methodName, $callback)
    {
        self::$_helper_methods[$methodName] = $callback;
    }
}
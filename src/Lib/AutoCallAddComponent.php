<?php

namespace AntdAdmin\Lib;

trait AutoCallAddComponent
{
    abstract protected function getCallMethod(): string;

    abstract protected function getNamespace(): string|array;

    public function __call(string $name, array $arguments)
    {
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
        E('column type: ' . $name . ' error');
    }
}
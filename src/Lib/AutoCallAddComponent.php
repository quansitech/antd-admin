<?php

namespace AntdAdmin\Lib;

trait AutoCallAddComponent
{
    abstract protected function getCallMethod(): string;

    abstract protected function getNamespace(): string|array;

    /**
     * 已注册的类型映射（容器类可覆盖此属性）
     * @var array ['ueditor' => 'FormItem\\Ueditor\\Column\\Ueditor']
     */
    protected static array $registeredTypes = [];

    protected static array $_helper_methods = [];

    public function __call(string $name, array $arguments)
    {
        if (isset(self::$_helper_methods[$name])) {
            return call_user_func_array(self::$_helper_methods[$name], [$this, ...$arguments]);
        }

        // 优先查找动态注册的类型
        if (isset(static::$registeredTypes[$name])) {
            $className = static::$registeredTypes[$name];
            return call_user_func([$this, $this->getCallMethod()], new $className(...$arguments));
        }

        // 兜底：原有命名空间查找逻辑
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
        throw new \Exception('type: ' . $name . ' not found');
    }

    public static function registerHelperMethod(string $methodName, callable $callback): void
    {
        self::$_helper_methods[$methodName] = $callback;
    }

    /**
     * 注册类型（通用方法）
     */
    public static function registerType(string $methodName, string $className): void
    {
        static::$registeredTypes[$methodName] = $className;
    }

    /**
     * 获取已注册的类型映射
     */
    public static function getRegisteredTypes(): array
    {
        return static::$registeredTypes;
    }
}
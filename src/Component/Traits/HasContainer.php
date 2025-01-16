<?php

namespace AntdAdmin\Component\Traits;

trait HasContainer
{
    protected function handleContainer(string $render_field, callable $callback)
    {
        if (!is_callable($callback)) {
            throw new \Exception("$render_field callback error");
        }
        $ref = new \ReflectionFunction($callback);
        $callback_params = $ref->getParameters();
        if (count($callback_params) < 1) {
            throw new \Exception("$render_field callback params error");
        }
        call_user_func($callback, $this->render_data[$render_field]);
    }
}
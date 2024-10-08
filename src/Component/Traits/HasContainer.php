<?php

namespace AntdAdmin\Component\Traits;

trait HasContainer
{
    protected function handleContainer(string $render_field, callable $callback)
    {
        if (!is_callable($callback)) {
            E("$render_field callback error");
        }
        $ref = new \ReflectionFunction($callback);
        $callback_params = $ref->getParameters();
        if (count($callback_params) < 1) {
            E("$render_field callback params error");
        }
        call_user_func($callback, $this->render_data[$render_field]);
    }
}
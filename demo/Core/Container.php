<?php

namespace Core;

class Container
{
    protected $bindings = [];

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key)
    {
        $resolver = $this->bindings[$key] ?? false;

        if (!$resolver) throw new BindingNotFound($key);

        return $resolver();
    }
}
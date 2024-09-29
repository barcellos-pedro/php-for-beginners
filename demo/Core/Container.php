<?php

namespace Core;

use Core\Exceptions\BindingNotFoundException;

class Container
{
    protected $bindings = [];

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    /**
     * @throws BindingNotFoundException
     */
    public function resolve($key)
    {
        $resolver = $this->bindings[$key] ?? false;

        if (!$resolver) throw new BindingNotFoundException($key);

        return $resolver();
    }
}
<?php

namespace Learning\Core;

use Learning\Core\Interfaces\RouteInterface;

class Application
{
    protected $router;

    public function __construct(RouteInterface $router)
    {
        $this->router = $router;
    }
    public function main()
    {
        $this->router->route();
    }
}
<?php

namespace Learning\Core\Interfaces;

interface RouteInterface
{
    public function route(): callable;
}
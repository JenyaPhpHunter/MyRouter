<?php

require_once __DIR__ . "/../vendor/autoload.php";

$router = new \Learning\Core\Services\Routing\Router('Learning\\App\\Controllers');
$router->addRoute('/order/product', function () {
    echo 'Run addRoute function';
    return 'Run addRoute function';
});

$application = new \Learning\Core\Application($router);
$application->main();

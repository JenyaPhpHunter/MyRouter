<?php

require_once __DIR__ . "/../vendor/autoload.php";

$router = new \Learning\Core\Services\Routing\Router('Learning\\App\\Controllers');
//$router = new \Learning\App\Services\MyRouting\MyRouter();

$application = new \Learning\Core\Application($router);
$application->main();


/*
Примерный код со стороны клиента:
// Initialization and configuration
$router = new Router();
$router->addRoute('/page/view', [PageController::class, 'view']);
$router->addRoute('/product/show', function () {
    return 'Run callback';
});
// Routing
$action = $router->route();
$action();
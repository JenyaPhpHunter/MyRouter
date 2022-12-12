<?php

require_once __DIR__ . "/../vendor/autoload.php";

$router = new \Learning\Core\Services\Routing\Router('Learning\\App\\Controllers');
$router->addRoute('/page/view', [PageController::class, 'view']);
$router->addRoute('/home/index', [HomeController::class, 'index']);
$router->addRoute('/product/show', function () {
    echo 'Run callback';
    return 'Run callback';
});

$application = new \Learning\Core\Application($router);
$application->main();

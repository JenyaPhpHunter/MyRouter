<?php

namespace Learning\App\Services\MyRouting;

use Learning\Core\Interfaces\RouteInterface;

class MyRouter implements RouteInterface
{

    public function route()
    {
        if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/'){
            echo "главная страница";
        } else {
            http_response_code(404);
            echo "page not found";
        }
    }
}
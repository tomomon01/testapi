<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        //$container->get('logger')->info("Slim-Skeleton '/' route");
        // Render index view
        //return $container->get('renderer')->render($response, 'index.phtml', $args);
        $Hello = new Slim\App\Controllers\Hello($container);
        return $Hello->index($request, $response, $args);
    });

    $app->get('/api/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
        $Hello = new Slim\App\Controllers\Hello($container);
        return $Hello->getJson($request, $response, $args);
    });
    $app->get('/apitest/select', function (Request $request, Response $response, array $args) use ($container) {
        $func = new Slim\App\Controllers\func($container);
//echo 'func';    
        return $func->userSelect($request, $response, $args);
    });

};

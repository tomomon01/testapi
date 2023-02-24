<?php
//use Psr\Http\Message\ResponseInterface as Response;
//use Psr\Http\Message\ServerRequestInterface as Request;
//use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php'; // オートローダー

$app = AppFactory::create(); // ファクトリークラス

//$app->get('/hello/{name}', function (Request $request, Response $response, array $args) { // ルーティング登録
//    $name = $args['name'];
//    $response->getBody()->write("Hello, $name");
//    return $response;
//});

$app->run(); // アプリケーションランナー

<?php
//$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
/*
echo '<pre>';
var_dump($dotenv);
echo '</pre>';
echo $_ENV['host'];
exit;
*/
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        // Database
        'db' => [
            'host'   => $_ENV['host'],//getenv('host'),
            'dbname' => $_ENV['dbname'],//getenv('dbname'),
            'user'   => $_ENV['user'],//getenv('user'),
            'pass'   => $_ENV['pass'],//getenv('pass'),
        ],
    ],
];

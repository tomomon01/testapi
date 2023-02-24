$app = new \Slim\Slim();
$app->get('/hoge',function($request, $response, $args){
  echo "hogehoge";
});

$app->run();

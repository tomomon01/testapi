<?php
namespace Slim\App\Controllers;
class Hello
{
    private $c;
    public function __construct($container) {
        $this->c = $container;
    }
    public function index($request, $response, $args)
    {
//echo 'test';
        // Sample log message
        $this->c->get('logger')->info("Slim-Skeleton '/' route");
        // Render index view
        return $this->c->get('renderer')->render($response, 'index.phtml', $args);
    }

    public function getJson($request, $response, $args)
    {
        $sql  = <<< SQL
SELECT *
  FROM animals
ORDER BY name
SQL;
        try {
            $stmt = $this->c->get('db')->prepare($sql);
            $stmt->execute();
            $list = $stmt->fetchAll();
        }catch(Exception $e){
            $this->c->get('logger')->error($e->getMessage());
        }
        $name = $request->getAttribute('name');
        return $response->withJson([
            "name" => $name,
            "list" => $list,
        ], 200);
    }
}

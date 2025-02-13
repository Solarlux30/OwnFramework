<?php 


$routes = new Symfony\Component\Routing\RouteCollection();
$routes->add('hello', new Symfony\Component\Routing\Route('/hello/{name}', ['name' => 'World']));
$routes->add('bye', new Symfony\Component\Routing\Route('/bye'));

return $routes;
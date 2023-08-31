<?php
// routes.php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('home', new Route('/', [
    '_controller' => 'App\\Controllers\\HomeController::index',
]));

// Define more routes here

return $routes;

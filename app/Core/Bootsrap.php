<?php

namespace App\Core;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpFoundation\Request;

class Bootsrap
{
    public function __construct()
    {
        $routes = require __DIR__ . '/../routes.php';

        $request = Request::createFromGlobals();
        $context = new RequestContext();
        $context->fromRequest($request);

        $matcher = new UrlMatcher($routes, $context);

        // Match the current request against the defined routes
        $parameters = $matcher->match($request->getPathInfo());

        // Extract controller and action from parameters
        list($controller, $action) = explode('::', $parameters['_controller']);

        // Create a new controller instance and call the action method
        $controllerInstance = new $controller();
        $controllerInstance->$action();
    }
}

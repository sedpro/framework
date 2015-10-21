<?php

namespace Framework;

class Router
{
    /**
     * @param $routes array
     * @throws Exception\BaseException
     * @throws Exception\NotFoundException
     * @return RouterResult
     */
    public function process($routes)
    {
        $path = parse_url($_SERVER['REQUEST_URI'])['path'];
        foreach ($routes as $regexp => $route) {
            preg_match('~^(?:' . $regexp . ')$~x', $path, $matches);

            if (isset($matches[0])) {
                $route = explode('/', $route);
                $controller = $route[0];
                $action = $route[1];
                $controllerName = "\\App\\Controller\\" . ucfirst($controller);
                $actionName = $action . 'Action';

                if(!is_callable(array($controllerName, $actionName))){
                    throw new Exception\BaseException('route matched, but action is not callable');
                };

                return (new RouterResult())
                    ->setControllerName($controllerName)
                    ->setController($controller)
                    ->setActionName($actionName)
                    ->setAction($action)
                    ->setParams($matches);
            }
        }

        throw new Exception\NotFoundException;
    }
}
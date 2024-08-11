<?php

namespace app\core;

use app\core\exception\NotFoundException;


class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];


    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $action)
    {
        $this->routes['get'][$path] = $action;
    }

    public function post($path, $action)
    {
        $this->routes['post'][$path] = $action;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $action = $this->routes[$method][$path] ?? false;
        if ($action === false) {
            $this->response->setStatusCode(404);
            throw new NotFoundException();
        }
        if (is_string($action)) {
            return Application::$app->view->renderView($action);
        }
        if (is_array($action)) {
            /** @var Controller $controller */
            $controller = new $action[0]();
            Application::$app->controller = $controller;
            $controller->action = $action[1];
            $action[0] = $controller;

            foreach ($controller->getMiddlewares() as $middleware) {
                $middleware->execute();
            }
        }
        return call_user_func($action, $this->request, $this->response);
    }
}

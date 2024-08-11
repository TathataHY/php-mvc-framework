<?php

namespace app\core;

use app\core\middlewares\BaseMiddleware;


class Controller
{
    public string $layout = 'main';
    public string $action = '';

    /** @var BaseMiddleware[] */
    protected array $middlewares = [];


    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function redirect($url)
    {
        Application::$app->response->redirect($url);
    }

    public function setFlash($key, $message)
    {
        Application::$app->session->setFlash($key, $message);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }
}

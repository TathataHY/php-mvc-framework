<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\models\LoginForm;
use app\models\User;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request)
    {
        $this->setLayout('auth');
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());

            if ($loginForm->validate() && $loginForm->login()) {
                $this->setFlash('success', 'You are logged in!');
                return $this->redirect('/');
            }
        }

        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $this->setLayout('auth');
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                $this->setFlash('success', 'Thanks for registering!');
                return $this->redirect('/login');
            }
        }

        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function logout()
    {
        Application::$app->logout();
        $this->redirect('/login');
    }

    public function profile()
    {
        return $this->render('profile');
    }
}

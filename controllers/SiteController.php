<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\ContactForm;


class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'Tathata',
        ];
        return $this->render('home', $params);
    }

    public function contact(Request $request)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());

            if ($contact->validate() && $contact->send()) {
                $this->setFlash('success', 'Thanks for contacting us.');
                return $this->redirect('/');
            }
        }

        return $this->render('contact', [
            'model' => $contact
        ]);
    }
}

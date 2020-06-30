<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main;
        $users = $model->findAll();
        $this->set(compact('users'));
    }
    public function companyAction()
    {
    }
}

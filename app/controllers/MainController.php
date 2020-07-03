<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\base\App;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main;
        $users = $model->findOneLast();
        App::$app->cache->get();
        $this->set(compact('users'));
    }
    public function companyAction()
    {
    }
}

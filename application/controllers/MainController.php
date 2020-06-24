<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Main;

class MainController extends Controller
{


    public function indexAction()
    {
        $model = new Main;
        $model->table = 'users';
        $users = $model->findLike(".ru", "email");
        $this->setMeta("Главная страница", "Описание слов", "Ключевые слова");
        $meta = $this->meta;
        $this->setParam(compact('users', "meta"));
    }
    public function companyAction()
    {
        $params = [
            'title' => 'Каталог компаний'
        ];
        $this->setParam($params);
    }
}

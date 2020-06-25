<?php

namespace application\controllers;

use application\core\Controller;
use application\core\Registry;
use application\models\Main;
use application\core\App;

class MainController extends Controller
{


    public function indexAction()
    {
        $model = new Main;
        $model->table = 'users';
        $this->setMeta("Главная страница", "Описание слов", "Ключевые слова");
        $meta = $this->meta;
        $this->setParam(compact("meta"));
    }
    public function companyAction()
    {
        $params = [
            'title' => 'Каталог компаний'
        ];
        $this->setParam($params);
    }
}

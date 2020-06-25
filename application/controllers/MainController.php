<?php

namespace application\controllers;

use application\core\Controller;
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
        $this->setMeta("Каталог компаний", "Описание слов", "Ключевые слова");
        $meta = $this->meta;

        if (isset($this->route['alias'])) {
            $category = $this->route['alias'];
        } else {
            $category = null;
        }

        $this->setParam(compact("meta", "category"));
    }
}

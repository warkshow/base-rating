<?php

namespace app\controllers;

use app\models\Main;
use warks\core\base\View;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main;
        View::setMeta("Главная страница", 'Опиание страниицы', "Ключевые слова");
    }


    public function companyAction()
    {
        //company - категории выводит
        //company/add - добавляет компанию
        //company/category - компании по категории
        //company/category/id - вывод компании по id

        if ($this->isAjax()) {
            $this->layout = false;
            View::setMeta('Компания!');
            debug($_POST);
            $this->loadView('');
            die;
        }
    }
}

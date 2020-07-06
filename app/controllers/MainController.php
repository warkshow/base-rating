<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\base\View;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main;
        View::setMeta("Главная страница", 'Опиание страниицы', "Ключевые слова");
    }
    public function companyAction()
    {
    }
}

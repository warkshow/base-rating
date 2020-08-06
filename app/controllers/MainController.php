<?php

namespace app\controllers;

use app\models\Main;
use warks\core\base\App;
use warks\core\base\View;
use warks\libs\Pagination;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main;
        $code_lang = App::$app->getProperty('lang')['code'];
        $popular_company = \R::find('company', "ORDER BY id LIMIT 4");
        $new_company = \R::find('company', "ORDER BY id DESC LIMIT 4");
        $categories = \R::find('rating_category');
        $sub_categories = \R::find('rating_sub_category');
        $countries = \R::find('countries', "ORDER BY title_$code_lang");
        View::setMeta("Главная страница", 'Опиание страниицы', "Ключевые слова");
        $this->set(compact('popular_company', 'new_company', 'code_lang', 'categories', 'sub_categories', 'countries'));
    }

    /**
     * Для пагинации
     *
     * $total = \R::count('users');
     * $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
     * $perpage = 2;
     * $pagination = new Pagination($page, $perpage, $total);
     * $start = $pagination->getStart();
     * $users = \R::findAll('users', "LIMIT $start, $perpage");
     */


}

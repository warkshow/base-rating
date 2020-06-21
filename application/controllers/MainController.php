<?php

namespace application\controllers;

use application\core\Controller;
use application\core\Router;
use application\lib\Pagination;

class MainController extends Controller
{


    public function indexAction()
    {
        // debug($this->currentRoute);
    }
    public function companyAction()
    {
        $pagination = new Pagination($this->route, 100);
        $vars = [
            'pagination' => $pagination->get()
        ];
        $this->view->render("Каталог компаний", $vars);
    }
}

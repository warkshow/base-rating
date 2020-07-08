<?php

namespace app\controllers\admin;

use vendor\core\base\View;

class UserController extends AppController
{
    public function indexAction()
    {
        // $this->layout = 'default';
        View::setMeta("Админка", "Гл стр", "кл слова");
        echo __METHOD__;
    }

    public function showUserAction()
    {
        echo __METHOD__;
    }
}

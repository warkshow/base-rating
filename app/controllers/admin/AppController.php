<?php

namespace app\controllers\admin;

use app\models\User;
use warks\core\base\Controller;

class AppController extends Controller
{
    public $layout = 'admin';

    public function __construct($route)
    {
        parent::__construct($route);
        if (!User::isAdmin()) {
            redirect(ADMIN);
        }
    }
}

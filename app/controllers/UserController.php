<?php


namespace app\controllers;

use app\models\User;

class UserController extends AppController
{
    public function  signUpAction(){
        $this->layout = false;
    }

    public function  signInAction(){
        $this->layout = false;
        $user = new User();
        $data = $_POST;
        $user->load($data);

    }

    public function logoutAction(){
        //
    }
}
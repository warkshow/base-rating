<?php


namespace app\controllers;

use app\models\User;

class UserController extends AppController
{
    /**
     * Регистрация
     */
    public function  signUpAction(){
        $this->layout = false;
    }

    /**
     * Вход
     */
    public function  signInAction(){
        $this->layout = false;
        $user = new User();
        $data = $_POST;
        $user->load($data);

    }

    /**
     * Выход
     */
    public function logoutAction(){
        //
    }
}
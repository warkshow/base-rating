<?php


namespace app\models;


use warks\core\base\Model;

class User extends Model
{
    public $attributes = [
        'login' => '',
        'password'=>'',
        'email'=>''
    ];
}
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

    public $rules = [
        "required" => [
            ['login'],
            ['password'],
            ['email'],
        ],
        'email'=>[
            ['email']
        ],
        'lengthMin'=>[
            ['login', 6],
            ['password', 6]
        ]
    ];
}
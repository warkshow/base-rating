<?php


namespace app\models;


use warks\core\base\Model;

class User extends Model
{
    public $attributes = [
        'username' => '',
        'password' => '',
        'email' => ''
    ];

    public $rules = [
        "required" => [
            ['username'],
            ['password'],

        ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
            ['username', 6],
            ['password', 6]
        ]
    ];

    public function checkUnique()
    {
        $user = \R::findOne('users', 'username = ? OR email = ? LIMIT 1',
            [$this->attributes['username'], $this->attributes['email']]);
        if (!empty($user)) {
            if ($user->username == $this->attributes['username']) {
                $this->errors['unique'][] = "Логин уже занят";
            }
            if ($user->email == $this->attributes['email']) {
                $this->errors['unique'][] = "Email уже занят";
            }
            return false;
        }
        return true;
    }

    public function login()
    {
        $login = !empty(trim($_POST['username'])) ? trim($_POST['username']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if ($login && $password) {
            $user = \R::findOne('users', 'username = ? LIMIT 1', [$login]);
            if ($user) {
                if (password_verify($password, $user->password)) {
                    foreach ($user as $key => $value) {
                        if ($key != 'password') {
                            $_SESSION['user'][$key] = $value;
                        }
                    }
                    return true;
                }
            }
        }
        $this->errors['unique'][] = 'Логин или пароль введен не верно!';
        return false;
    }

    public static function isAdmin()
    {
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin');
    }
}

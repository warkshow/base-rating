<?php


namespace app\controllers;

use app\models\User;
use warks\core\base\App;
use warks\core\base\View;

class UserController extends AppController
{
    /**
     * Регистрация
     */
    public function signUpAction()
    {
        if ($this->isAjax()) {
            if (!isLogin()) {
                $this->layout = false;
                $user = new User();
                $data = $_POST;
                $user->load($data);
                if (!$user->validate($data) || !$user->checkUnique()) {
                    echo json_encode($user->getErrors());
                } else {
                    $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                    $user->save('users');
                    echo json_encode(['success' => 'register']);
                }

            }
        } else {
            redirect("/");
        }
    }

    /**
     * Вход
     */
    public function signInAction()
    {
        if ($this->isAjax()) {
            if (!isLogin()) {
                $this->layout = false;
                if (!empty($_POST)) {
                    $user = new User();
                    if ($user->login()) {
                        echo json_encode(['success' => 'login']);
                    } else {
                        echo json_encode($user->getErrors());
                    }
                }
            } else {
                redirect();
            }
        } else {
            redirect();
        }
    }

    /**
     * Выход
     */
    public function logoutAction()
    {
        if (isLogin()) {
            unset($_SESSION['user']);
            if ($this->route['controller'] == "User") redirect("/");
            else redirect();
        } else {
            redirect("/");
        }
    }

    public function cabinetAction()
    {
        if (isLogin()) {
            View::setMeta('Личный кабинет', "Личный кабинет пользователя");
            $code_lang = App::$app->getProperty('lang')['code'];
            $categories = \R::find('rating_category');
            $sub_categories = \R::find('rating_sub_category');
            $countries = \R::find('countries', "ORDER BY title_$code_lang");
            $this->set(compact('categories', 'sub_categories', 'countries', 'code_lang'));
        } else redirect("/");
    }

    /**
     * Смена пароля
     */

    public function changePasswordAction()
    {
        if (isLogin()) {
            $this->layout = false;
            $userModel = new User();
            $passwordOld = $_POST['password_old'];
            $user = \R::findOne('users', 'username = ? LIMIT 1', [$_SESSION['user']['username']]);
            if ($user) {
                if (password_verify($passwordOld, $user->password)) {
                    $passwordNew = $_POST['password_new'];
                    $passwordVerify = $_POST['password_verify'];
                    if ($passwordNew === $passwordVerify) {
                        $passwordNew = password_hash($passwordNew, PASSWORD_DEFAULT);
                        \R::exec("UPDATE users SET password = '$passwordNew' WHERE id = {$_SESSION['user']['id']}");
                        $_SESSION['message'] = "Пароль успешно изменен!";
                    } else {
                        $_SESSION['errors'] = "Новый пароль и пароль подтверждения не совпадают!";
                    }
                } else {
                    $_SESSION['errors'] = "Старый пароль не правильный!";
                }

            }
            redirect();

        } else {
            redirect();
        }
    }
}


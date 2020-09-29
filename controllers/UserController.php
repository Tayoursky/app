<?php
namespace controllers;

use models\User;
use vendor\Controller;

class UserController extends Controller
{



    public function loginAction()
    {
        $title = 'Login';
        $user = new User();

        if (isset($_POST['login']) && isset($_POST['password'])) {
            $user->auth($_POST['login'], $_POST['password']);
        }


        if (isset($_GET["is_exit"]) && $_GET["is_exit"] == 1) {
            $user->logout();
            header("Location: ?is_exit=0");
        }

        $this->set(compact('user', 'title'));
    }
}

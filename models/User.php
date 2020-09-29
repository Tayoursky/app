<?php
namespace models;

use vendor\Model;

class User extends Model
{
    private $_login = "admin";
    private $_password = "123";


    public function isAuth()
    {
        if (isset($_SESSION["is_auth"]))
            return $_SESSION["is_auth"];
        return false;
    }

    public function auth($login, $passwors)
    {
        if ($login == $this->_login && $passwors == $this->_password) {
            $_SESSION["is_auth"] = true;
            $_SESSION["login"] = $login;
            return true;
        } else {
            $_SESSION["is_auth"] = false;
            return false;
        }
    }

    public function getLogin()
    {
        if ($this->isAuth())
            return $_SESSION["login"];
        return false;
    }

    public function logout() {
        $_SESSION = [];
        session_destroy();
    }
}
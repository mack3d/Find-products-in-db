<?php

namespace App\Controllers;

class LoginController
{
    private $cookie_name = "user_logged_in";

    public function sign_out()
    {
        setcookie($this->cookie_name, '', time(), "/");
        // redirect
    }

    public function sign_in()
    {
        setcookie($this->cookie_name, 'test_value', time() + 60, "/");
        header('Location: /');
        exit();
    }
}

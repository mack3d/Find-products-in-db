<?php

namespace App\Controllers;

class AuthController
{
    public function authenticate()
    {
        if (!isset($_COOKIE['user_logged_in'])) {
            header('Location: /signin');
            exit();
        }
    }
}

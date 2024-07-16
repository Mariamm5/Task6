<?php

namespace Models\AdminLoginModel;
session_start();

class AdminLoginModel
{
    public function login($username, $password)
    {
        if ($username === 'admin' && $password === 'admin') {
            $_SESSION['admin'] = true;
            header("Location:../views/admin/AddBooks.php");
        } else {
            unset($_SESSION['admin']);
            header("Location:../views/admin/AdminLogin.php");
        }
    }

    public function logout()
    {
        session_destroy();
        unset( $_SESSION['admin']);
        header("Location:../views/admin/AdminLogin.php");

    }
}
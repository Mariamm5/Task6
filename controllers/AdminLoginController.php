<?php


use Models\AdminLoginModel\AdminLoginModel;
include_once '../models/AdminLoginModel.php';
var_dump($_POST);


class AdminLoginController
{
    private $username;
    private $password;


    public function __construct()
    {
        $this->username = $_POST['username'];
        $this->password = $_POST['password'];

    }

    public function login()
    {
        if ($this->username && $this->password) {
            $admin = new AdminLoginModel();
            $admin->login($this->username, $this->password);
        } else {
            header("Location:../views/admin/AdminLogin.php");
            exit();
        }
    }

    public function logout()
    {
        $admin = new AdminLoginModel();
        $admin->logout();
    }

}

if (isset($_POST['login'])) {
    if (!empty($_POST['username'] && !empty($_POST['password']))) {
        $admin = new AdminLoginModel();
        $admin->login($_POST['username'], $_POST['password']);

    } else {
        $admin = new AdminLoginModel();
        $admin->logout();

    }
}

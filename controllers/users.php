<?php

class Users extends Controller
{
    protected function Index()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header("location: " . ROOT_URL . "/users/login");
        }

        $viewmodel = new UserModel();
        $this->returnView($viewmodel->Index(), true);
    }

    protected function register()
    {
        if (isset($_SESSION['is_logged_in'])) {
            header("location: " . ROOT_URL . "/home/index");
        }

        $viewmodel = new UserModel();
        $this->ReturnView($viewmodel->register(), true);
    }

    protected function login()
    {
        if (isset($_SESSION['is_logged_in'])) {
            header("location: " . ROOT_URL . "/home/index");
        }

        $viewmodel = new UserModel();
        $this->ReturnView($viewmodel->login(), true);
    }

    protected function logout()
    {
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy();
        // Redirect
        header('Location: ' . ROOT_URL . '/home/index');
    }

    protected function changePassword()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header("location: " . ROOT_URL . "/users/login");
        }

        $viewmodel = new UserModel();
        $this->ReturnView($viewmodel->changePassword(), true);
    }

    protected function changeEmail()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header("location: " . ROOT_URL . "/users/login");
        }

        $viewmodel = new UserModel();
        $this->ReturnView($viewmodel->changeEmail(), true);
    }
}
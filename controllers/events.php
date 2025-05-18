<?php

class Events extends Controller
{
    protected function Index()
    {
        $viewmodel = new EventModel();
        $this->returnView($viewmodel->Index(), true);
    }

    protected function add()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header("location: " . ROOT_URL . "/users/login");
        }

        $viewmodel = new EventModel();
        $this->returnView($viewmodel->add(), true);
    }

    protected function update()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header("location: " . ROOT_URL . "/users/login");
        }

        $viewmodel = new EventModel();
        $this->returnView($viewmodel->update(), true);
    }

    protected function delete()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header("location: " . ROOT_URL . "/users/login");
        }

        $viewmodel = new EventModel();
        $this->returnView($viewmodel->delete(), true);
    }

    protected function apuntarse()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header("location: " . ROOT_URL . "/users/login");
        }

        $viewmodel = new EventModel();
        $this->returnView($viewmodel->apuntarse(), true);
    }

    protected function desapuntarse()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header("location: " . ROOT_URL . "/users/login");
        }

        $viewmodel = new EventModel();
        $this->returnView($viewmodel->desapuntarse(), true);
    }

    protected function apuntado()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header("location: " . ROOT_URL . "/users/login");
        }

        $viewmodel = new EventModel();
        $this->returnView($viewmodel->apuntado(), true);
    }

    protected function creado()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header("location: " . ROOT_URL . "/users/login");
        }

        $viewmodel = new EventModel();
        $this->returnView($viewmodel->creado(), true);
    }
}
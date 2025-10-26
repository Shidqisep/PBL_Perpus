<?php

class Controller
{
    public function view($view, $data = []) {
        extract($data);
        $viewFile = '../app/view/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            die('Error file tidak ditemukan' . $viewFile);
        }
    }

    public function model($model){

        $modelFile = '../app/view' . $model . '.php';
        if (file_exists($modelFile)) {
            require_once $modelFile;
            return new $model;
        }else {
            die('model tidak ditemukan' . $modelFile);
        }
    }
}

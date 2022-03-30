<?php

class Controller
{
  public $view;
  public $model;

  public function __construct()
  {
    $this->view = new View();
    $this->model = new Model();
  }

  public function loadModel($nombre)
  {
    require_once 'model/'.$nombre.'.php';
  }
}
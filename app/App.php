<?php

class App
{
  public function __construct()
  {
    $url = $_GET['url'] ?? ""; 
    $url = rtrim($url, "/"); 
    $url = explode('/',$url);
    
    if (empty($url[0])) {
      require_once './controller/Initial.controller.php';
      $initial = new InitialController();
      $initial->index();
      return;
    }
    $fileRouteController = "controller/".ucfirst($url[0]).".controller.php";
    if (!file_exists($fileRouteController)) {
      die("Error, no existe el controlador");
    }

    require $fileRouteController;
    $controllername = ucfirst($url[0])."Controller";
    $controller = new $controllername;

    if(count($url)==1) {
      $controller->index();
    }
    if (count($url)==2) {
      if (!method_exists($controller,$url[1])) {
        die("Error, el metodo no existe");
      }
      $controller->{$url[1]}();
    }
  }
}
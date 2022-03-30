<?php

class View
{

  public function __construct()
  {
    
  }

  public function show($route)
  {
    require_once './view/template/header.php';
    require_once './view/'.$route.'.php';
    require_once './view/template/footer.php';
  }
}
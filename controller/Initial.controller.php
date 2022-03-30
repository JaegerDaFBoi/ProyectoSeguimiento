<?php

class InitialController extends Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->view->show("initial/initial");
  }
}
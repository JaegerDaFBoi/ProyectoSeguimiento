<?php

class CategoryController extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->loadModel("Category");
  }

  public function index()
  {
    $category = new Category();
    $categories = $category->showCategories();
    $this->view->categories = $categories;
    $this->view->show('category/list');
  }

  public function create()
  {
    $this->view->show('category/create');
  }

  public function saveCategory()
  {
    $nombre = $_POST['nombre'] ?? "";

    $category = new Category();
    $category->save($nombre);
    /*if ($category->save($nombre)) {
      $this->index();
    }*/ 
  }
}
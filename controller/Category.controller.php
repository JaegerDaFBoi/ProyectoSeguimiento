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
    //$this->view->categories = $categories;
    $this->view->show('category/list',$categories);
  }
}
<?php

class ProductController extends Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->loadModel("Product");
  }

  public function index()
  {
    $product = new Product("","","");
    $products = $product->showProducts();
    $this->view->products = $products;
    $this->view->show('product/list');
  }

  public function create()
  {
    $this->view->show('product/create');
  }

  public function save()
  {
    $product = new Product($_POST['nombreproducto'], $_POST['precioproducto'], $_POST['categoria']);
    $product->save();
  }  
}
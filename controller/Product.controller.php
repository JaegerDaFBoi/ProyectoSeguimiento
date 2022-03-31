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

    $product = new Product("","","");
    $products = $product->showProducts();
    $this->view->products = $products;
    $this->view->show('product/list');
  }
  
  public function edit()
  {
    $product = new Product("","","");
    $products = $product->search();
    $this->view->product = $products;
    $this->view->show('product/update');
  }

  public function updateProduct()
  {
    $id = $_POST['id'] ?? "";
    $nombre = $_POST['nombreproducto'] ?? "";
    $precio = $_POST['precioproducto'] ?? "";
    $categoria = $_POST['categoria'] ?? "";

    $product = new Product($nombre,$precio,$categoria);
    $product->update($id);

    $product = new Product("","","");
    $products = $product->showProducts();
    $this->view->products = $products;
    $this->view->show('product/list');
  }

  public function delete()
  {
    $product = new Product("","","");
    $products = $product->search();
    $this->view->product = $products;
    $this->view->show('product/delete');
  }

  public function deleteProduct()
  {
    $id = $_POST['id'] ?? "";
    $nombre = $_POST['nombreproducto'] ?? "";
    $precio = $_POST['precioproducto'] ?? "";
    $categoria = $_POST['categoria'] ?? "";

    $product = new Product($nombre,$precio,$categoria);
    $product->delete($id);

    $product = new Product("","","");
    $products = $product->showProducts();
    $this->view->products = $products;
    $this->view->show('product/list');
  }
}
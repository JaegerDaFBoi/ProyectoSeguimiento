<?php

class Product extends Model
{

  public $id;
  public $name;
  public $price;
  public $category;

  public function __construct($name, $price, $category)
  {
    parent::__construct();
    $this->name=$name;
    $this->price=$price;
    $this->category=$category;
  }

  public function save()
  {
    try {
      $sql = "INSERT INTO productos (nombre, precio, fk_categoria) VALUES (:nombre, :precio, :categoria)";
      $query = $this->connection->prepare($sql);
      $query->execute([":nombre"=>$this->name, ":precio"=>$this->price, ":categoria"=>$this->category]);
    } catch (PDOException $e) {
      die("Error al guardar datos: ".$e->getMessage());
    }
  }

  public function showProducts()
  {
    try {
      $sql = $this->connection->query("SELECT productos.id, productos.nombre, productos.precio, categorias.nombre AS categorianombre FROM productos INNER JOIN categorias ON productos.fk_categoria = categorias.id");
      $products = $sql->fetchAll(PDO::FETCH_OBJ);
      return $products;
    } catch (PDOException $e) {
      die("Error al mostrar datos: ".$e->getMessage());
    }
  }
}
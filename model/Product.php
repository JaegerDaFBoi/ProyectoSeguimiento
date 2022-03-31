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

  public function search()
  {
    try {
      $sql = $this->connection->query("SELECT * FROM productos WHERE id=".$_GET['id']);
      $product = $sql->fetchAll(PDO::FETCH_OBJ);
      return $product;
    } catch (PDOException $e) {
      die("Error al mostrar datos: ".$e->getMessage());
    }
  }

  public function update($id)
  {
    $this->id = $id;
    try {
      $sql = "UPDATE productos SET nombre=:nombre, precio=:precio, fk_categoria=:categoria WHERE id=:id";
      $query = $this->connection->prepare($sql);
      $query->execute([":nombre"=>$this->name, ":precio"=>$this->price, ":categoria"=>$this->category,":id"=>$id]);
    } catch (PDOException $e) {
      die("Error al actualizar datos: ".$e->getMessage());
    }
  }

  public function delete ($id)
  {
    $this->id = $id;
    try {
      $sql = "DELETE FROM productos WHERE id=:id";
      $query = $this->connection->prepare($sql);
      $query->execute([":id"=>$id]);
    } catch (PDOException $e) {
      die("Error al eliminar datos: ".$e->getMessage());
    }
  }
}
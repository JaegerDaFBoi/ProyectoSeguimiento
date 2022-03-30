<?php

class Category extends Model
{
  public $id;
  public $name;

  public function __construct()
  {
    parent::__construct();
  }

  public function save($name)
  {
    $this->name = $name;
    try {
      $sql = "INSERT INTO categorias (nombre) VALUES (:nombre)";
      $query = $this->connection->prepare($sql);
      $query->execute([":nombre"=>$this->name]);
    } catch (PDOException $e) {
      die("Error al guardar el usuario: ". $e->getMessage());
    }
  }

  public function showCategories()
  {
    try {
      $sql = "SELECT * FROM categorias";
      $data = $this->connection->query($sql,PDO::FETCH_ASSOC);
      $categories=[];
      foreach ($data as $row) {
        $category = new Category($row['id'],$row['nombre']);
        array_push($categories,$category);
      }
      return $categories;
    } catch (PDOException $e) {
      die("Error, no se pueden listar las categorias: ". $e->getMessage());
    }
  }
}
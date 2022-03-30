<?php

class Connection
{

  protected $connection;

  public function __construct()
  {
    try {
      $driver = DBTYPE.":host=".DBHOST.";dbname=".DBNAME;
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      ];
      $this->connection = new PDO($driver,DBUSER,DBPASS,$options);
    } catch (PDOException $e) {
      die("Error al conectar con la base de datos: ".$e->getMessage());
    }
  }
}
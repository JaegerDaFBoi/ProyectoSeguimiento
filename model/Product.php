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


}
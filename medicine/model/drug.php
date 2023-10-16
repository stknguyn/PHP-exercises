<?php
class Drug
{
  private $id, $name, $decription, $category_id, $price, $stock_quantity;
  public function __construct()
  {
    $this->id = 0;
    $this->name = '';
    $this->decription = '';
    $this->category_id = 0;
    $this->price = 0;
    $this->stock_quantity = 0;
  }
  public function getID()
  {
    return $this->id;
  }
  public function setID($value)
  {
    $this->id = $value;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setName($value)
  {
    $this->name = $value;
  }
  public function getDescription()
  {
    return $this->decription;
  }
  public function setDescription($value)
  {
    $this->decription = $value;
  }
  public function getCategoryID()
  {
    return $this->category_id;
  }
  public function setCategoryID($value)
  {
    $this->category_id = $value;
  }
  public function getPrice()
  {
    return $this->price;
  }
  public function setPrice($value)
  {
    $this->price = $value;
  }
  public function getStockQuantity()
  {
    return $this->stock_quantity;
  }
  public function setStockQuantity($value)
  {
    $this->stock_quantity = $value;
  }
}

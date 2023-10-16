<?php 
class Category {
  private $id, $name, $description;
  public function __construct()
  {
    $this->id = 0;
    $this->name = '';
    $this->description = '';
  }
  public function getID() {
    return $this->id;
  }
  public function setID($value) {
    $this->id = $value;
  }
  public function getName() {
    return $this->name;
  }
  public function setName($value) {
    $this->name = $value;
  }
  public function getDescription() {
    return $this->description;
  }
  public function setDescription($value) {
    $this->description = $value;
  }
}
?>
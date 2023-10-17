<?php
class DrugDB
{
  public function getDrugs()
  {
    $db = Database::getDB();
    $query = 'SELECT * FROM drug';
    $result = $db->query($query);
    $drugs = array();
    foreach ($result as $row) {
      $drug = new Drug();
      $drug->setID($row['DrugID']);
      $drug->setName($row['Name']);
      $drug->setDescription($row['Description']);
      $drug->setCategoryID($row['CategoryID']);
      $drug->setPrice($row['Price']);
      $drug->setStockQuantity($row['StockQuantity']);
      $drugs[] = $drug;
    }
    return $drugs;
  }
  public function deleteDrug($drug_id)
  {
    $db = Database::getDB();
    $query = "DELETE FROM drug WHERE DrugID ='$drug_id'";
    $result = $db->exec($query);
    return $result;
  }
  public function addDrug($drug)
  {
    $db = Database::getDB();
    $name =   $drug->getName();
    $description = $drug->getDescription();
    $category_id = $drug->getCategoryID();
    $price = $drug->getPrice();
    $stock_quantity = $drug->getStockQuantity();
    $query = "INSERT INTO drug (Name, Description, CategoryID, Price, StockQuantity)
            VALUES ('$name','$description','$category_id','$price','$stock_quantity')";
    $result = $db -> exec($query);
    return $result;
  }
  public function getDrug($drug_id) {
    $db = Database::getDB();
    $query = "SELECT * FROM drug WHERE DrugID = '$drug_id'";
    $stmt = $db -> query($query);
    $result = $stmt -> fetch();
    $drug = new Drug();
    $drug ->setID($result['DrugID']);
    $drug -> setName($result['Name']);
    $drug -> setDescription($result['Description']);
    $drug -> setPrice($result['Price']);
    $drug -> setCategoryID($result['CategoryID']);
    $drug -> setStockQuantity($result['StockQuantity']);
    return $drug;
  }
  public function getDrugsByCategory($category_id) {
    $db = Database::getDB();
    $query = "SELECT * FROM drug WHERE CategoryID = '$category_id' ORDER BY DrugID";
    $results = $db -> query($query);
    $drugs = array();
    foreach($results as $row) {
      $drug = new Drug();
      $drug ->setID($row['DrugID']);
      $drug ->setName($row['Name']);
      $drug ->setDescription($row['Description']);
      $drug ->setCategoryID($row['CategoryID']);
      $drug ->setPrice($row['Price']);
      $drug ->setStockQuantity($row['StockQuantity']);
      $drugs[] =$drug;
    }
    return $drugs;
  }
  public function editDrug($id,$name,$description,$category_id,$price,$stock_quantity) {
    $db = Database::getDB();
    $query = "UPDATE drug SET Name = '$name',Description ='$description',CategoryID = '$category_id',Price = '$price',StockQuantity = '$stock_quantity' WHERE DrugID = $id";
    $result = $db ->exec($query);
    return $result;
  }
}
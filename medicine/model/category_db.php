<?php 
class CategoryDB {
    public function getCategories() {
    $db = Database::getDB();
    $query = 'SELECT * FROM category';
    $results = $db ->query($query);
    $categories = array();
    foreach($results as $row) {
      $category = new Category();
      $category ->setID($row['CategoryID']);
      $category -> setName($row['CategoryName']);
      $category -> setDescription($row['Description']);
      $categories[] = $category;
    }
    return $categories;
  }
  public function getCategory($category_id) {
    $db = Database::getDB();
    $query = "SELECT * FROM category WHERE CategoryID = '$category_id'";
    $stmt = $db -> query($query);
    $result = $stmt ->fetch();
    $category = new Category();
    $category -> setID($result['CategoryID']);
    $category -> setName($result['CategoryName']);
    $category -> setDescription($result['Description']);
    return $category;
  }
}
?>
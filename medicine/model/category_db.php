<?php
class CategoryDB
{
  public function getCategories()
  {
    $db = Database::getDB();
    $query = 'SELECT * FROM category';
    $results = $db->query($query);
    $categories = array();
    foreach ($results as $row) {
      $category = new Category();
      $category->setID($row['CategoryID']);
      $category->setName($row['CategoryName']);
      $category->setDescription($row['Description']);
      $categories[] = $category;
    }
    return $categories;
  }
  public function getCategory($category_id)
  {
    $db = Database::getDB();
    $query = "SELECT * FROM category WHERE CategoryID = '$category_id'";
    $stmt = $db->query($query);
    $result = $stmt->fetch();
    $category = new Category();
    $category->setID($result['CategoryID']);
    $category->setName($result['CategoryName']);
    $category->setDescription($result['Description']);
    return $category;
  }
  public function generateMenu($categories, $parent_id = 0, $level = 1)
  {
    echo '<ul class="nav navbar-nav">';
    foreach ($categories as $category) {
      if ($category['parent_id'] == $parent_id) {
        echo '<li class="position-relative nav-item ">';
        echo '<a href="#" class="nav-link" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-haspopup="true" aria-expanded="false">' . ucfirst($category['category_name']) . '</a>';
        $hasChildCategories = false;
        foreach ($categories as $childCategory) {
          if ($childCategory['parent_id'] == $category['id']) {
            $hasChildCategories = true;
            break;
          }
        }

        if ($hasChildCategories) {
          if ($level > 1) {
            echo '<div class="dropend" style="top: -120%; left: 5%">';
            echo '<ul class="dropdown-menu" style="min-width: 200px;">';
            CategoryDB::generateMenu($categories, $category['id'], $category['level'] + 1); // Recursive call
            echo '</ul>';
            echo '</div>';
          } else if ($level == 1) {
            echo '<ul class="dropdown-menu" style="min-width: 200px;">';
            CategoryDB::generateMenu($categories, $category['id'], $category['level'] + 1); // Recursive call
            echo '</ul>';
          }
        }
      }
    }
    echo '</ul>';
  }
}

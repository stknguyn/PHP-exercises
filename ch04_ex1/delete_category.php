<?php 
$category_id = filter_input(INPUT_POST, 'category_id');
if($category_id == null) {
  $error = 'Invalid category data. Please check all fields and try again!';
}
else {
  require_once('database.php');
  $query = 'DELETE FROM categories WHERE categoryID = :category_id';
  $statement = $db -> prepare($query);
  $statement -> bindValue(':category_id', $category_id);
  $statement -> execute();
  $statement -> closeCursor();
  include('category_list.php');
}
?>
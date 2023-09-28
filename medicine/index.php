<?php 
require('../../model/database.php');
require('../../model/users_db.php');
$action =filter_input(INPUT_POST, 'action');
if ($action == null) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action == null) {
    $action = 'products_view';
  }
}
//
switch ($action) {
  case 'products_view':
    break;
  
  default:
    # code...
    break;
}
?>
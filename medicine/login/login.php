<?php require_once('../database.php');
  $username = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'password');
  if( $username == null && $password == null) {
    include('../database_error.php');
  }
  else if ($username == 'admin' && $password == 'admin') {
    echo 'Dung con me no luon';
  }
  else {
    echo 'Sai roi, nhap lai';
  }
?>
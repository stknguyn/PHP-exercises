<?php
require_once('database.php');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
if ( $username == null || $password == null) {
  $error_message = "Username or password is not found. Please re-enter username and password";
  include('../database_error.php');
}
else {
  $query = 'SELECT * FROM users WHERE username = :username AND password = :password';
  $statements = $db -> prepare($query);
  $statements -> bindValue(':username', $username);
  $statements -> bindValue(':password', $password);
  $statements -> execute();
  $result = $statements -> fetch();
  if ($result == null || $result == false) {
  $error_message = "Wrong username or password. Please try again!";
  include('../database_error.php');
  }
  else {
    include('admin.php');
  }
}
?>
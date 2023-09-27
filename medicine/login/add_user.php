<?php
require_once('database.php');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$fullname = filter_input(INPUT_POST, 'fullname');
if ($username == null || $password == null) {
  $error_message = "Username or password is not found. Please re-enter username and password";
  include('../database_error.php');
} else {
  $query = 'SELECT * FROM users WHERE username = :username';
  $statements = $db->prepare($query);
  $statements->bindValue(':username', $username);
  $statements->execute();
  $result = $statements->fetch();
  if ($result != null || $result != false) {
    $error_message = "Username already exist. Please re-enter another username";
    include('../database_error.php');
  } else {
    $queryAdd = 'INSERT INTO users (username, password, fullname) VALUES (:username,:password,:fullname)';
    $statements = $db->prepare($queryAdd);
    $statements->bindValue(':username', $username);
    $statements->bindValue(':password', $password);
    $statements->bindValue(':fullname', $fullname);
    $statements -> execute();
    $statements -> closeCursor();
    include('login.php');
  }
}

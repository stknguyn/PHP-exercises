<?php
function add_user($username, $password)
{
  global $db;
  if ($username == null || $password == null) {
    $error_message = "Username or password is not found. Please re-enter username and password";
    include('../error/database_error.php');
  } else {
    $query = 'SELECT * FROM users WHERE username = :username';
    $statements = $db->prepare($query);
    $statements->bindValue(':username', $username);
    $statements->execute();
    $result = $statements->fetch();
    if ($result != null || $result != false) {
      $error_message = "Username already exist. Please re-enter another username";
      include('../error/database_error.php');
    } else {
      $queryAdd = 'INSERT INTO users (username, password, fullname) VALUES (:username,:password,:fullname)';
      $statements = $db->prepare($queryAdd);
      $statements->bindValue(':username', $username);
      $statements->bindValue(':password', $password);
      $statements->bindValue(':fullname', $fullname);
      $statements->execute();
      $statements->closeCursor();
    }
  }
}
function check_user($username, $password)
{
  global $db;
  if ($username == null || $password == null) {
    $error_message = "Username or password is not found. Please re-enter username and password";
    include('../error/database_error.php');
  } else {
    $query = 'SELECT * FROM users WHERE username = :username AND password = :password';
    $statements = $db->prepare($query);
    $statements->bindValue(':username', $username);
    $statements->bindValue(':password', $password);
    $statements->execute();
    $result = $statements->fetch();
    if ($result == null || $result == false) {
      $error_message = "Wrong username or password. Please try again!";
      include('../error/database_error.php');
    }
  }
}

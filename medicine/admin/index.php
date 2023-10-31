<?php
session_start();
require('./model/admin.php');
require('./model/admin_db.php');
require('./model/database.php');
$adminDB = new AdminDB();
$view = filter_input(INPUT_POST, 'view');
if ($view == null) {
  $view = filter_input(INPUT_GET, 'view');
  if ($view == null) {
    $view = 'account';
  }
}
$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
  $action = filter_input(INPUT_GET, 'action');
}
switch ($view) {
  case 'account':
    header('Location: account.php');
    break;
  case 'register':
    include('register.php');
    break;
  case 'login':
    include('login.php');
    break;
    case 'logout':
      session_destroy();
      include('login.php');
      break;
}
switch ($action) {
  case 'add_admin':
    $firstname = filter_input(INPUT_POST, 'firstname');
    $lastname = filter_input(INPUT_POST, 'lastname');
    $email = filter_input(INPUT_POST, 'email');
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $admin = new Admin();
    $admin->setFirstname($firstname);
    $admin->setLastname($lastname);
    $admin->setEmail($email);
    $admin->setUsername($username);
    $admin->setPassword($password);
    $result = 0;
    if ($admin->getUsername() == '') {
      echo "<script>alert('cannot create account')</script>";
    } else {
      $result = $adminDB->addAdmin($admin);
    }
    if ($result == 0) {
      header('Location: create-fail.php');
      exit();
    } else {
      header('Location: create-success.php');
      exit();
    }
    break;
  case 'login':
    $username = filter_input(INPUT_POST, 'username');
    $username = trim($username);
    $password = filter_input(INPUT_POST, 'password');
    if ($username !== null && $password !== null) {
      $check = $adminDB->checkAdmin($username, $password);
      if ($check == true) {
        $id = $adminDB -> getAdminID($username,$password);
        $_SESSION['user_name'] = $adminDB ->getAdminNameByID($id);
        echo "<script>$('#successToast').toast('show');</script>";
        header('Location: home.php');
        exit();
      } else {
        header('Location: login-fail.php');
        exit();
      }
    } else {
      header('Location: login-fail.php');
      exit();
    }
    break;
}

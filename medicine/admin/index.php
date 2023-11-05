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
    $view = 'login';
  }
}
$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
  $action = filter_input(INPUT_GET, 'action');
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
        $id = $adminDB->getAdminID($username, $password);
        $_SESSION['user_name'] = $adminDB->getAdminNameByID($id);
        $_SESSION['expire'] = time() + 60*60*2;
        $view = 'login';
      } else {
        header('Location: login-fail.php');
        exit();
      }
    } else {
      header('Location: login-fail.php');
      exit();
    }
    break;
  case 'edit_account':
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $firstname = filter_input(INPUT_POST, 'firstname');
    $lastname = filter_input(INPUT_POST, 'lastname');
    $email = filter_input(INPUT_POST, 'email');
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $adminDB->editAdmin($id, $firstname, $lastname, $email, $username, $password);
    header('Location: account.php');
    break;

  case 'delete_account':
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $adminDB->deleteAdmin($id);
    header('Location: account.php');
    break;
}
switch ($view) {
  case 'account':
    if (isset($_SESSION['expire'])) {
      header('Location: account.php');
      exit();
    } else {
      header('Location: login.php');
      exit();
    }
    break;
  case 'register':
    header('register.php');
    exit();
    break;
  case 'login':
    if (isset($_SESSION['user_name']) && isset($_SESSION['expire'])) {
      header('Location: account.php');
      exit();
    } else {
      header('Location: login.php');
      exit();
    }
    break;
  case 'logout':
    unset($_SESSION['user_name']);
    session_destroy();
    header('Location: login.php');
    exit();
    break;
  case 'edit_form':
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $admin = $adminDB->getAdmin($id);
    include('./view/admin_edit.php');
}

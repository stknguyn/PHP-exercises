<?php
class AdminDB
{
  public function getAdmins()
  {
    $db = Database::getDB();
    $query = 'SELECT * FROM admins';
    $result = $db->query($query);
    $admins = array();
    foreach ($result as $row) {
      $admin = new Admin();
      $admin->setID($row['ID']);
      $admin->setFirstname($row['Firstname']);
      $admin->setLastname($row['Lastname']);
      $admin->setEmail($row['Email']);
      $admin->setUsername($row['Username']);
      $admin->setPassword($row['Password']);
      $admins[] = $admin;
    }
    return $admins;
  }
  public function addAdmin($admin)
  {
    $db = Database::getDB();
    $firstname =   $admin->getFirstname();
    $lastname = $admin->getLastname();
    $email = $admin->getEmail();
    $username = $admin->getUsername();
    $password = $admin->getPassword();
    $query = "INSERT INTO admins (Firstname, Lastname, Email, Username, Password)
            VALUES ('$firstname','$lastname','$email','$username','$password')";
    $result = $db->exec($query);
    return $result;
  }
  public function checkAdmin($username, $password)
  {
    $db = Database::getDB();
    $query = "SELECT * FROM admins WHERE Username = '$username' AND Password = '$password'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }
  public function getAdminID($username, $password)
  {
    $db = Database::getDB();
    $query = "SELECT * FROM admins WHERE Username = '$username' AND Password = '$password'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch();
    if ($row) {
      return $row['ID'];
    }
  }
  public function getAdminNameByID($id)
  {
    $db = Database::getDB();
    $query = "SELECT * FROM admins WHERE ID = '$id'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch();
    if ($row) {
      return $row['Firstname'] . ' ' . $row['Lastname'];
    }
  }
  public function deleteAdmin($id)
  {
    $db = Database::getDB();
    $query = "DELETE FROM admins WHERE ID ='$id'";
    $result = $db->exec($query);
    return $result;
  }
  public function editAdmin($id, $firstname, $lastname, $email, $username, $password)
  {
    $db = Database::getDB();
    $query = "UPDATE admins SET Firstname = '$firstname', Lastname ='$lastname', Email = '$email', Username = '$username', Password = '$password' WHERE ID = $id";
    $result = $db->exec($query);
    return $result;
  }
  public function getAdmin($id)
  {
    $db = Database::getDB();
    $query = "SELECT * FROM admins WHERE ID = '$id'";
    $stmt = $db->query($query);
    $result = $stmt->fetch();
    $admin = new Admin();
    $admin->setID($result['ID']);
    $admin->setFirstname($result['Firstname']);
    $admin->setLastname($result['Lastname']);
    $admin->setEmail($result['Email']);
    $admin->setUsername($result['Username']);
    $admin->setPassword($result['Password']);
    return $admin;
  }
}

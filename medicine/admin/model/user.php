<?php
abstract class User
{
  protected $id, $firstname, $lastname, $username, $password, $email;

  public function __construct()
  {
    $this->id = 0;
    $this->firstname = '';
    $this->lastname = '';
    $this->username = '';
    $this->password = '';
    $this->email = '';
  }

  public function getID()
  {
    return $this->id;
  }
  public function setID($value)
  {
    $this->id = $value;
  }
  public function getFirstname()
  {
    return $this->firstname;
  }
  public function setFirstname($value)
  {
    $this->firstname = $value;
  }
  public function getLastname()
  {
    return $this->lastname;
  }
  public function setLastname($value)
  {
    $this->lastname = $value;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setEmail($value)
  {
    $this->email = $value;
  }
  public function getUsername()
  {
    return $this->username;
  }
  public function setUsername($value)
  {
    $this->username = $value;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function setPassword($value)
  {
    $this->password = $value;
  }
}

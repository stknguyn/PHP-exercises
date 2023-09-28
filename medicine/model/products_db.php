<?php
function select_medicine()
{
  global $db;
  $query = 'SELECT * FROM medicine';
  $statements = $db->prepare($query);
  $statements->execute();
  $medicines = $statements->fetchAll();
  $statements->closeCursor();
  return $medicines;
}
function select_medicine_type()
{
  global $db;
  $queryType = 'SELECT * FROM medicinetype';
  $statementsType = $db->prepare($queryType);
  $statementsType->execute();
  $medicineTypes = $statementsType->fetchAll();
  $statementsType->closeCursor();
  return $medicineTypes;
}
function add_medicine_type($medicineTypeName)
{
  if ($medicineTypeName == null) {
    $error_message = 'Invalid data. Check all fields and try again';
  } else {
    require_once('database.php');
    $query = 'INSERT INTO medicinetype (medicineTypeID, medicineTypeName) VALUES
            (NULL, :medicineTypeName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':medicineTypeName', $medicineTypeName);
    $statement->execute();
    $statement->closeCursor();
  }
};
function add_medicine($medicineTypeID, $quantity, $decription)
{
  global $db;
    $query = 'INSERT INTO medicine (medicineID, medicineTypeID, quantity, decription) VALUES
            (NULL, :medicineTypeID, :quantity, :decription)';
    $statement = $db->prepare($query);
    $statement->bindValue(':medicineTypeID', $medicineTypeID);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':decription', $decription);
    $statement->execute();
    $statement->closeCursor();
};
function delete_medicine_type($medicineTypeID) {
  global $db;
  $query = 'DELETE FROM medicinetype WHERE medicineTypeID = :medicineTypeID';
  $stmt = $db -> prepare($query);
  $stmt -> bindValue(':medicineTypeID', $medicineTypeID);
  $stmt -> execute();
  $stmt -> closeCursor();
}
function delete_medicine($medicineID) {
  global $db;
  $query = 'DELETE FROM medicineID WHERE medicineID = :medicineID';
  $stmt = $db -> prepare($query);
  $stmt -> bindValue(':medicineID', $medicineID);
  $stmt -> execute();
  $stmt -> closeCursor();
}

<?php 
$medicineID = filter_input(INPUT_POST, 'medicineID', FILTER_VALIDATE_INT);
$medicineTypeID = filter_input(INPUT_POST, 'medicineTypeID', FILTER_VALIDATE_INT);
if ($medicineID == null || $medicineTypeID == null) {
  $error_message = 'Having a conflict while get data to delete. Please try again!';
  include('database_error.php');
}
else {
  require_once('../model/database.php');
  $query = 'DELETE FROM medicine WHERE medicine.medicineID = :medicineID AND medicine.medicineTypeID = :medicineTypeID';
  $statement = $db -> prepare($query);
  $statement ->bindValue(':medicineID', $medicineID);
  $statement ->bindValue(':medicineTypeID', $medicineTypeID);
  $statement -> execute();
  $statement -> closeCursor();
  include('index.php');
}
?>
<?php 
$medicineTypeID = filter_input(INPUT_POST, 'medicineTypeID', FILTER_VALIDATE_INT);
if ($medicineTypeID == null) {
  $error_message = 'Having a conflict while get data to delete. Please try again!';
  include('database_error.php');
}
else {
  require_once('../model/database.php');
  $query = 'DELETE FROM medicinetype WHERE medicinetype.medicineTypeID = :medicineTypeID';
  $statementType = $db -> prepare($query);
  $statementType ->bindValue(':medicineTypeID', $medicineTypeID);
  $statementType -> execute();
  $statementType -> closeCursor();
  include('index.php');
}
?>
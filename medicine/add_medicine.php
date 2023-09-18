<?php 
$medicineTypeID = filter_input(INPUT_POST, 'medicineTypeID',FILTER_VALIDATE_INT);
$quantity = filter_input(INPUT_POST, 'quantity',FILTER_VALIDATE_INT);
$decription = filter_input(INPUT_POST,'decription');
// validate 
if($medicineTypeID == null || $quantity == null) {
  $error_message = 'Invalid data. Check all fields and try again';
  include('database_error.php');
}
else {
  require_once('database.php');
  $query = 'INSERT INTO medicine (medicineID, medicineTypeID, quantity, decription) VALUES
            (NULL, :medicineTypeID, :quantity, :decription)';
  $statement = $db -> prepare($query);
  $statement -> bindValue(':medicineTypeID', $medicineTypeID);
  $statement -> bindValue(':quantity', $quantity);
  $statement -> bindValue(':decription', $decription);
  $statement -> execute();
  $statement -> closeCursor();
  include('index.php');
}

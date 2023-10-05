<?php 
$medicineTypeName = filter_input(INPUT_POST, 'medicineTypeName');
// validate 
if($medicineTypeName == null) {
  $error_message = 'Invalid data. Check all fields and try again';
  include('database_error.php');
}
else {
  require_once('../model/database.php');
  $query = 'INSERT INTO medicinetype (medicineTypeID, medicineTypeName) VALUES
            (NULL, :medicineTypeName)';
  $statement = $db -> prepare($query);
  $statement -> bindValue(':medicineTypeName', $medicineTypeName);
  $statement -> execute();
  $statement -> closeCursor();
  include('index.php');
}

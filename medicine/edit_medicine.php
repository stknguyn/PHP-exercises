<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form class="row g-3" action="add_medicine.php" method="post">
    <div class="col-auto form-floating">
      <input class="form-control" id="medicineTypeID" name="medicineTypeID" placeholder="">
      <label for="medicineTypeID">Medicine Type ID</label>
    </div>
    <div class="col-auto form-floating">
      <input class="form-control" id="quantity" name="quantity" placeholder="Quantity">
      <label for="quantity">Quantity</label>
    </div>
    <div class="col-auto form-floating">
      <input class="form-control" id="decription" name="decription" placeholder="Decription">
      <label for="decription">Decription</label>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary">Add Medicine</button>
    </div>
  </form>
</body>

</html>
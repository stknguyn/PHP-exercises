<?php require_once('database.php');
$query = 'SELECT * FROM medicine';
$statements = $db->prepare($query);
$statements->execute();
$medicines = $statements->fetchAll();
$statements->closeCursor();
//medicine type
$queryType = 'SELECT * FROM medicinetype';
$statementsType = $db->prepare($queryType);
$statementsType->execute();
$medicineTypes = $statementsType->fetchAll();
$statementsType->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <table border="1" class="table table-striped table-hover">
    <thead>
      <th scope="col">Medicine ID</th>
      <th scope="col">Medicine Type ID</th>
      <th scope="col">Quantity</th>
      <th scope="col">Decription</th>
      <th>&nbsp;</th>
    </thead>
    <tbody>
      <?php foreach ($medicines as $medicine) : ?>
        <tr>
          <th scope="row">
            <?php echo $medicine['medicineID'] ?>
          </th>
          <td>
            <?php echo $medicine['medicineTypeID'] ?>
          </td>
          <td>
            <?php echo $medicine['quantity'] ?>
          </td>
          <td>
            <?php echo $medicine['decription'] ?>
          </td>
          <td>
            <form action="delete_medicine.php" method="post">
              <input type="hidden" name="medicineID" value="<?php echo $medicine['medicineID'] ?>">
              <input type="hidden" name="medicineTypeID" value="<?php echo $medicine['medicineTypeID'] ?>">
              <a class="btn btn-warning" href="edit_medicine.php">Edit</a>
              <input class="btn btn-danger" type="submit" value="Delete">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <form class="row g-3" action="add_medicine.php" method="post">
    <div class="col-auto form-floating">
      <select class="form-select" name="medicineTypeID">
        <?php foreach ($medicineTypes as $medicineType) : ?>
          <option value="<?php echo $medicineType['medicineTypeID'] ?>"><?php echo $medicineType['medicineTypeName'] ?></option>
        <?php endforeach; ?>
      </select>
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
  <div class="mb-3"></div>


  <table border="1" class="table table-striped table-hover">
    <thead>
      <th scope="col">Medicine Type ID</th>
      <th scope="col">Medicine Type Name</th>
      <th>&nbsp;</th>
    </thead>
    <tbody>
      <?php foreach ($medicineTypes as $medicineType) : ?>
        <tr>
          <th scope="row">
            <?php echo $medicineType['medicineTypeID'] ?>
          </th>
          <td>
            <?php echo $medicineType['medicineTypeName'] ?>
          </td>
          <td>
            <form action="delete_medicine_type.php" method="post">
              <input type="hidden" name="medicineTypeID" value="<?php echo $medicineType['medicineTypeID'] ?>">
              <a class="btn btn-warning" href="edit_medicine.php">Edit</a>
              <input class="btn btn-danger" type="submit" value="Delete">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <form class="row g-3" action="add_medicine_type.php" method="post">
    <div class="col-auto form-floating">
      <input class="form-control" id="medicineTypeName" name="medicineTypeName" placeholder="Type name">
      <label for="medicineTypeName">Add Medicine Type</label>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary">Add Type</button>
    </div>
  </form>
</body>

</html>
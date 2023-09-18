<?php require_once('database.php');
$query = 'SELECT * FROM medicine';
$statements = $db->prepare($query);
$statements->execute();
$medicines = $statements->fetchAll();
$statements->closeCursor();

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
      <th scope="col">medicineID</th>
      <th scope="col">medicineTypeID</th>
      <th scope="col">quantity</th>
      <th scope="col">decription</th>
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
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>
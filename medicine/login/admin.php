<?php require_once('database.php');
$query = 'SELECT * FROM users';
$stmt = $db->prepare($query);
$stmt->execute();
$rows = $stmt->fetchAll();
$stmt->closeCursor();
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
      <th scope="col">Fullname</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th>&nbsp;</th>
    </thead>
    <tbody>
      <?php foreach ($rows as $row) : ?>
        <tr>
          <th scope="row">
            <?php echo $row['fullname'] ?>
          </th>
          <td>
            <?php echo $row['username'] ?>
          </td>
          <td>
            <?php echo $row['password'] ?>
          </td>
          <td>
            <form action="delete_user.php" method="post">
              <input type="hidden" name="username" value="<?php echo $row['username'] ?>">
              <input type="hidden" name="password" value="<?php echo $row['password'] ?>">
              <a class="btn btn-warning" href="edit_medicine.php">Edit</a>
              <input class="btn btn-danger" type="submit" value="Delete">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>
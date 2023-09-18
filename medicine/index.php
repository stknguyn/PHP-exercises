<?php require_once('database.php');
$queryCategory = 'SELECT * FROM medicine';
$statements = $db -> prepare($queryCategory);
$statements -> execute();
$medicines= $statements -> fetchAll();
$medicineTypeName = $medicines['medicineTypeName'];
$statements -> closeCursor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical Care</title>
</head>
<body>
  <header>
    <h1>Medicine Manager</h1>
  </header>
  <main>
    <h1>List</h1>
    <aside>
      <h2>Types</h2>
      <nav>
        <ul>
          <?php foreach ($medicines as $medicine) :?>
            <li> <?php echo $medicines['medicineTypeName']?></li>
            <?php endforeach;?>
        </ul>
      </nav>
    </aside>
  </main>
</body>
</html>

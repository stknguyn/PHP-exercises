<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../main2.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <title>Document</title>
</head>

<body>
  <?php
  require('../model/database.php');
  require('../model/category.php');
  require('../model/category_db.php');
  require('../model/drug.php');
  require('../model/drug_db.php');
  $categoryDB = new CategoryDB();
  $drugDB = new DrugDB();

  $action = filter_input(INPUT_POST, 'action');
  if ($action == null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == null) {
      $action = 'drugs_list';
    }
  }
  switch ($action) {
    case 'drugs_list':
      $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
      if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
      }
      $current_category = $categoryDB->getCategory($category_id);
      $categories = $categoryDB->getCategories();
      $current_drugs = $drugDB->getDrugsByCategory($current_category->getID());
      include('drug_list.php');
      break;

    case 'drug_view':
      $drug_id = filter_input(INPUT_POST, 'drug_id', FILTER_VALIDATE_INT);
      $drug = $drugDB->getDrug($drug_id);
      include('drug_view.php');
      break;
  }
  ?>
</body>

</html>
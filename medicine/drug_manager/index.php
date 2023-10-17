<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    case 'drug_edit':
      $drug_id = filter_input(INPUT_POST, 'drug_id', FILTER_VALIDATE_INT);
      $drug = $drugDB->getDrug($drug_id);
      include('drug_edit.php');
      break;
    case 'drug_add':
      $categories = $categoryDB->getCategories();
      include('drug_add.php');
      break;
    case 'drug_delete':
      $drug_id = filter_input(INPUT_POST, 'drug_id', FILTER_VALIDATE_INT);
      if ($drug_id == null) {
        $error_message = 'Cannot get drug id';
        include('../error/database_error.php');
      } else {
        $result = $drugDB->deleteDrug($drug_id);
        if ($result == 0) {
          $error = 'Cannot delete drug';
          include('../error/error.php');
        } else {
          $error = 'Delete successfully';
          include('../error/error.php');
        }
      }
      break;
    case 'add_drug':
      $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
      $name = filter_input(INPUT_POST, 'name');
      $description = filter_input(INPUT_POST, 'description');
      $price = filter_input(INPUT_POST, 'price');
      $stock_quantity = filter_input(INPUT_POST, 'stock_quantity');
      if ($category_id == null || $name == null || $price == null || $stock_quantity == null) {
        $error = 'Some information is missing or wrong';
        include('../error/error.php');
      } else {
        $drug = new Drug();
        $drug->setCategoryID($category_id);
        $drug->setName($name);
        $drug->setDescription($description);
        $drug->setPrice($price);
        $drug->setStockQuantity($stock_quantity);
        $result = $drugDB->addDrug($drug);
        if ($result == 0) {
          $error_message = 'Cannot add the drug to database';
          include('../error/database_error.php');
        } else {
          $error = "Adding drug successfully";
          include('../error/error.php');
        }
      }
      break;
    case 'drug_view':
      $drug_id = filter_input(INPUT_POST, 'drug_id', FILTER_VALIDATE_INT);
      $drug = $drugDB->getDrug($drug_id);
      include('../view/drug_view.php');
      break;
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
    case 'edit_drug':
      $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
      $name = filter_input(INPUT_POST, 'name');
      $description = filter_input(INPUT_POST, 'description');
      $category_id = filter_input(INPUT_POST, 'category_id');
      $price = filter_input(INPUT_POST, 'price');
      $stock_quantity = filter_input(INPUT_POST, 'stock_quantity');
      if ($id == null || $name == null || $description == null || $category_id == null || $category_id == null || $price == null || $stock_quantity == null) {
        $error = 'Missing information to change, please check and try again';
        include('../error/error.php');
      } else {
        $result = $drugDB->editDrug($id, $name, $description, $category_id, $price, $stock_quantity);
        if ($result > 0) {
          $error_message = 'success';
          include('../error/database_error.php');
        } else {
          $error_message = 'Cannot update to database!';
          include('../error/database_error.php');
        }
      }
      break;
  }
  ?>
</body>

</html>
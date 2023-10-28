<?php include('../view/header.php') ?>
<?php
$drug = new Drug();
$current_drug = $drugDB->getDrug($drug_id);
?>
<main>
  <div class="container">
    <form action="index.php" method="post">
      <div class="mb-2 ">
        <label for="formID" class="form-label">Drug ID:</label>
        <input name="id" type="text" class="form-control disabled" id="formID" value="<?php echo $current_drug->getID() ?>" readonly>
      </div>
      <div class="mb-2 ">
        <label for="formName2" class="form-label">Name:</label>
        <input name="name" type="text" class="form-control" id="formName2" value="<?php echo $current_drug->getName() ?>">
      </div>
      <div class="mb-2 ">
        <label for="formDescription3" class="form-label">Description:</label>
        <input name="description" type="text" class="form-control" id="formDescription3" value="<?php echo $current_drug->getDescription() ?>">
      </div>
      <div class="mb-2 ">
        <label for="formCatID4" class="form-label">Category ID:</label>
        <input name="category_id" type="text" class="form-control" id="formCatID4" value="<?php echo $current_drug->getCategoryID() ?>">
      </div>
      <div class="mb-2 ">
        <label for="formPrice5" class="form-label">Price:</label>
        <input name="price" type="text" class="form-control" id="formPrice5" value="<?php echo $current_drug->getPrice() ?>">
      </div>
      <div class="mb-2 ">
        <label for="formStockQuan6" class="form-label">Stock Quantity:</label>
        <input name="stock_quantity" type="text" class="form-control" id="formStockQuan6" value="<?php echo $current_drug->getStockQuantity() ?>">
      </div>
      <div class="mb-2">
        <input type="hidden" name="action" value="edit_drug">
        <input type="submit" class="form-control btn btn-primary">
      </div>
    </form>
  </div>
</main>
<?php include('../view/footer.php') ?>
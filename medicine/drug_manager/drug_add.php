<?php include('../view/header.php') ?>
<h2 class="text-center text-success">ADD DRUG</h2>
<div class="container">
  <form action="index.php" method="post">
    <div class="mb-2">
      <label for="SelectCat" class="form-label">Category ID:</label>
      <select name="category_id" id="SelectCat" class="form-select">
        <?php foreach ($categories as $category) : ?>
          <option value="<?php echo $category->getID() ?>">
            <?php echo $category->getName() ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-2">
      <label for="formName" class="form-label">Name:</label>
      <input name="name" type="text" class="form-control" id="formName">
    </div>
    <div class="mb-2">
      <label for="formDes" class="form-label">Description:</label>
      <input name="description" type="text" class="form-control" id="formDes">
    </div>
    <div class="mb-2">
      <label for="formPrice" class="form-label">Price:</label>
      <input name="price" type="text" class="form-control" id="formPrice">
    </div>
    <div class="mb-2">
      <label for="formStockQuan" class="form-label">Stock Quantity:</label>
      <input name="stock_quantity" type="text" class="form-control" id="formStockQuan">
    </div>
    <div class="mb-2">
      <input type="hidden" name="action" value="add_drug">
      <input type="submit" class="form-control btn btn-success" placeholder="Add">
    </div>
  </form>
</div>
<?php include('../view/footer.php') ?>
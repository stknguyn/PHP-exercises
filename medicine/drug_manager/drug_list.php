<?php include('../view/header.php') ?>
<main>
  <h1 class="text-warning text-center">MANAGER PAGE</h1>
  <div class="container row">
    <aside class="col-lg-2">
      <h3 class="text-primary">Categories</h3>
      <nav>
        <ul class="list-group list-group-flush">
          <?php foreach ($categories as $category) : ?>
            <a class="list-group-item" href="?category_id=<?php echo $category->getID() ?>">
              <?php echo $category->getName(); ?>
            </a>
          <?php endforeach; ?>
        </ul>
      </nav>
    </aside>
    <section class="col-lg-10">
      <h4 class="text-success align-baseline"><?php echo $current_category->getName(); ?></h4>
      <table class="table table-light table-borderless table-hover">
        <thead>
          <tr>
            <th scope="col" class="align-middle text-center">ID</th>
            <th scope="col" class="align-middle text-center">Name</th>
            <th scope="col" class="align-middle text-center">Decription</th>
            <th scope="col" class="align-middle text-center">Price</th>
            <th scope="col" class="align-middle text-center">Stock Quantity</th>
            <th scope="col" colspan="3" class="align-middle text-center">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($current_drugs as $drug) : ?>
            <tr>
              <th class="align-middle text-center"><?php echo $drug->getID() ?></th>
              <td class="align-middle text-center"><?php echo $drug->getName() ?></td>
              <td class="align-middle text-center"><?php echo $drug->getDescription() ?></td>
              <td class="align-middle text-center"><?php echo $drug->getPrice() ?></td>
              <td class="align-middle text-center"><?php echo $drug->getStockQuantity() ?></td>
              <td>
                <form action="index.php" method="post">
                  <input type="hidden" name="drug_id" value="<?php echo $drug->getID(); ?>">
                  <input type="hidden" name="action" value="drug_view">
                  <button class="btn btn-info" type="submit">
                    View
                  </button>
                </form>
              </td>
              <td>
                <form action="index.php" method="post">
                  <input type="hidden" name="drug_id" value="<?php echo $drug->getID(); ?>">
                  <input type="hidden" name="action" value="drug_edit">
                  <button class="btn btn-warning" type="submit">
                    Edit
                  </button>
                </form>
              </td>
              <td>
                <form action="index.php" method="post">
                  <input type="hidden" name="drug_id" value="<?php echo $drug->getID(); ?>">
                  <input type="hidden" name="action" value="drug_delete">
                  <button class="btn btn-danger" type="submit">
                    Delete
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <form action="index.php">
        <input type="hidden" name="action" value="drug_add">
        <button type="submit" class="btn btn-success">Add drug</button>
      </form>
      <form action="index.php">
        <input type="hidden" name="action" value="drug_upload">
        <button type="submit" class="btn btn-secondary">Upload Image</button>
      </form>
    </section>
  </div>
  <div class="row">
    <div class="col-md-3">
      <a class="btn btn-lg btn-primary fix-content" href="../index.php">Back</a>
    </div>
  </div>
</main>
<?php include('../view/footer.php') ?>
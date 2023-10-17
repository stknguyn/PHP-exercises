<?php include('../view/header.php') ?>
<?php
$drugDB = new DrugDB();
$current_drug = $drugDB->getDrug($drug_id);
?>
<main>
  <div class="container-fluid text-center">
    <div class="row">
      <div class="col-md-4 sm-2 lg-6">
        <div class="card" style="width: 30rem;">
          <img alt="<?php echo $current_drug->getName() ?>" src="../images/<?php echo $current_drug->getName() ?>.png" class="card-img">
        </div>
      </div>
      <div class="col-md-8 sm-10 lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?php echo $current_drug->getName(); ?></h4>
            <p class="card-text"><?php echo $current_drug->getDescription(); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include('../view/footer.php') ?>
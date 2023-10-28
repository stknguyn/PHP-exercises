<?php include('../view/header.php') ?>
<h2 class="text-center text-success">UPLOAD IMAGE</h2>
<div class="container">
  <form action="index.php" method="post" enctype="multipart/form-data">
    <div class="mb-2">
      <label for="drug_image" class="form-label"></label>
      <input type="file" name="drug_image" class="form-control" id="drug_image">
    </div>
    <div class="mb-2">
      <input type="hidden" name="action" value="upload_drug">
      <button type="submit" class="form-control btn btn-secondary">
        Upload
      </button>
    </div>
  </form>
</div>
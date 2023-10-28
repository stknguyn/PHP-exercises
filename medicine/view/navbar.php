<?php
require('./model/category_db.php');
require_once('./model/database.php');
$categoryDB = new CategoryDB();
$categories = $categoryDB->getCategories();
?>
<nav class="navbar navbar-expand-lg" style="background-color: #fff;">
  <a href="#" class="navbar-brand"><img src="./image/logo.png" alt="Logo" style="width: 100px;"></a>
  <?php $categoryDB->generateMenu($categories) ?>
</nav>
<?php 
include('./includes/header.php');
$current_account = $adminDB -> getAdmin($id);

?>
<body>
  <main>
    <div class="container">
      <form action="index.php" method="post">
        <div class="mb-2 ">
          <label for="formID" class="form-label">ID:</label>
          <input name="id" type="text" class="form-control disabled" id="formID" value="<?php echo $current_account->getID() ?>" readonly>
        </div>
        <div class="mb-2 ">
          <label for="formName2" class="form-label">Firstname:</label>
          <input name="firstname" type="text" class="form-control" id="formName2" value="<?php echo $current_account->getFirstname() ?>">
        </div>
        <div class="mb-2 ">
          <label for="formDescription3" class="form-label">Lastname:</label>
          <input name="lastname" type="text" class="form-control" id="formDescription3" value="<?php echo $current_account->getLastname() ?>">
        </div>
        <div class="mb-2 ">
          <label for="formCatID4" class="form-label">Email:</label>
          <input name="email" type="text" class="form-control" id="formCatID4" value="<?php echo $current_account->getEmail() ?>">
        </div>
        <div class="mb-2 ">
          <label for="formPrice5" class="form-label">Username:</label>
          <input name="username" type="text" class="form-control" id="formPrice5" value="<?php echo $current_account->getUsername() ?>">
        </div>
        <div class="mb-2 ">
          <label for="formStockQuan6" class="form-label">Password:</label>
          <input name="password" type="text" class="form-control" id="formStockQuan6" value="<?php echo $current_account->getPassword() ?>">
        </div>
        <div class="mb-2">
          <input type="hidden" name="action" value="edit_account">
          <input type="submit" class="form-control btn btn-primary">
        </div>
      </form>
    </div>
  </main>
</body>
</html>
<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Login</title>
</head>

<body>
  <div class="container">
    <h3>Login</h3>
    <form action="login.php" method="post">
      <div class="col-auto form-floating row">
        <input type="text" class="form-control" id="username" name="username" placeholder="">
        <label for="username">Username</label>
      </div>
      <div class="col-auto form-floating row">
      <input type="password" class="form-control" id="password" name="password" placeholder="">
      <label for="password">Password</label>
    </div>
      <div class="col-auto form-floating row">
      <input type="submit" class="btn btn-primary" value="Sign-in">
    </div>

    </form>
  </div>
</body>

</html>
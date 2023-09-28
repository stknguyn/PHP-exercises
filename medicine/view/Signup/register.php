<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Login</title>
</head>

<body>
  <div class="container container-sm d-flex bd-highlight">
    <form action="add_user.php" method="post">
      <span class="input-group-text">Username:</span>
      <input type="text" class="form-control" name="username">

      <span class="input-group-text">Password:</span>
      <input type="password" class="form-control" name="password">

      <span class="input-group-text">Fullname:</span>
      <input type="fullname" class="form-control" name="fullname">

      <input type="submit" class="btn btn-primary text-center" value="Sign up">
    </form>
  </div>
</body>

</html>
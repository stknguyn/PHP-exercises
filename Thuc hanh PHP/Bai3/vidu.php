<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<?php
$error = '';
$number = filter_input(INPUT_POST, 'number');
$string = '';
if (empty($number)) {
  $error = 'hay nhap so !';
}
if ($number >= 0 && $number <= 9) {
  switch ($number) {
    case 0:
      $string = 'khong';

    case 1:
      $string = 'mot';
      break;
    case 2:
      $string = 'hai';
      break;
    case 3:
      $string = 'ba';
      break;
    case 4:
      $string = 'bon';
      break;
    case 5:
      $string = 'nam';
      break;
    case 6:
      $string = 'sau';
      break;
    case 7:
      $string = 'bay';
      break;
    case 8:
      $string = 'tam';
      break;
    case 9:
      $string = 'chin';
      break;
  }
} else {
  $error = 'So phai nam trong khoang 0 - 9';
}
?>

<body>
  <form action="vidu.php" method="POST">
    <table width="519" border="1">
      <tr>
        <td colspan="3">Đọc số</td>
      </tr>
      <tr>
        <td>Nhập số (0-9)</td>
        <td width="69" rowspan="2"><input type="submit" name="button" id="button" value="Submit" /></td>
        <td> Bằng chữ</td>
      </tr>
      <tr>
        <td width="177">
          <p>
            <label for="textfield"></label>
            <input type="text" name="number" id="textfield" />
          </p>
        </td>
        <td width="232"><label for="textfield2"></label>
          <input type="text" name="string" id="textfield2" value="<?php if (empty($error)) echo $string ?>" />
        </td>
      </tr>
      <tr>
        <td width='232'>
          <p><?php if (isset($error)) echo $error ?></p>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<?php
$fi_num = filter_input(INPUT_POST, 'first_num');
$se_num = filter_input(INPUT_POST, 'second_num');
$tong = 0;
$tich = 1;
$tong_le = 0;
$tong_chan = 0;
for ($i = $fi_num; $i <= $se_num; $i++) {
  $tong += $i;
  $tich *= $i;
  if ($i % 2 == 0) {
    $tong_chan += $i;
  } else {
    $tong_le += $i;
  }
}

?>

<body>
  <form action="vidu.php" method="post">
    <table width="728" border="1">
      <tr>
        <td width="122">&nbsp;</td>
        <td width="76">Số bắt đầu</td>
        <td width="169"><label for="textfield"></label>
          <input type="text" name="first_num" id="textfield" value="" />
        </td>
        <td width="152">Số kết thúc</td>
        <td width="175"><label for="textfield2"></label>
          <input type="text" name="second_num" id="textfield2" value="" />
        </td>
      </tr>
      <tr>
        <td colspan="5">Kết quả
          <label for="textfield3"></label>
        </td>
      </tr>
      <tr>
        <td>Tổng các số</td>
        <td colspan="4"><label for="textfield4"></label>
          <input type="text" name="tong" id="textfield4" value="<?php echo $tong ?>" />
        </td>
      </tr>
      <tr>
        <td>Tích các số</td>
        <td colspan="4"><label for="textfield5"></label>
          <input type="text" name="tich" id="textfield5" value="<?php echo $tich ?>" />
        </td>
      </tr>
      <tr>
        <td>Tổng các số chẵn</td>
        <td colspan="4"><label for="textfield6"></label>
          <input type="text" name="tong_chan" id="textfield6" value="<?php echo $tong_chan ?>" />
        </td>
      </tr>
      <tr>
        <td>Tổng các số lẻ</td>
        <td colspan="4"><label for="textfield7"></label>
          <input type="text" name="tong_le" id="textfield7" value="<?php echo $tong_le ?>" />
        </td>
      </tr>
      <tr>
        <td colspan="5"><input type="submit" name="button" id="button" value="Tính toán" /></td>
      </tr>
    </table>
  </form>
</body>

</html>
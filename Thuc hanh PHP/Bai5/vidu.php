<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<?php
$a = filter_input(INPUT_POST, 'a');
$b = filter_input(INPUT_POST, 'b');
$c = filter_input(INPUT_POST, 'c');
function pt_bac_1($a, $b)
{
  if ($a == 0) {
    if ($b == 0)
      $nghiem = "Phương trình có vô số nghiệm";
    if ($b <> 0)
      $nghiem = "Phương trình vô nghiệm";
  } else {
    $nghiem = "x= " . round(- ($b / $a), 2);
  }
  return $nghiem;
}
function pt_bac_2($a, $b, $c)
{ {
    if ($a == 0)
      $nghiem = pt_bac_1($b, $c);
    if ($a != 0) {
      $delta = pow($b, 2) - 4 * $a * $c;
      if ($delta < 0)
        $nghiem = "Phương trình vô nghiệm";
      if ($delta == 0) {
        $nghiem = "Phương trình có nghiệm kép x1=x2=" . - ($b / 2 * $a);
      } else {
        $can = sqrt($delta);
        $x1 = (-$b + $can) / (2 * $a);
        $x2 = (-$b - $can) / (2 * $a);
        $nghiem = "Phương trình có 2 nghiệm phân biệt 
    x1= " . round($x1, 2) . ",x2= " . round($x2, 2);
      }
    }
    return $nghiem;
  }
}
if (isset($a) && isset($b) && isset($c)) {
  $nghiem = pt_bac_2($a, $b, $c);
}
?>

<body>
  <form action="vidu.php" method="post">
    <table width="806" border="1">
      <tr>
        <td colspan="4" bgcolor="#336699"><strong>Giải phương trình bậc 2</strong></td>
      </tr>
      <tr align="center">
        <td width="83">Phương trình </td>
        <td width="236">
          <input name="a" type="text" />
          X^2 +
        </td>
        <td width="218"><label for="textfield3"></label>
          <input type="text" name="b" id="textfield3" />
          X+
        </td>
        <td width="241"><label for="textfield"></label>
          <input type="text" name="c" id="textfield" />
          =0
        </td>
      </tr>
      <tr align="center">
        <td>Nghiệm</td>
        <td colspan="3">
          <label for="textfield2"></label>
          <p id="textfield2"><?php if (isset($nghiem)) echo $nghiem ?></p>
      </tr>
      <tr>
        <td colspan="4" align="center" valign="middle"><input type="submit" name="chao" id="chao" value="Xuất" /></td>
      </tr>
    </table>
  </form>
</body>

</html>
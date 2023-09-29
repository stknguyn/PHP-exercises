<?php
//set default value of variables for initial page load
if (!isset($investment)) {
  $investment = '10000';
}
if (!isset($interest_rate)) {
  $interest_rate = '5';
}
if (!isset($years)) {
  $years = '5';
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Future Value Calculator</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body>
  <main>
    <h1>Future Value Calculator</h1>
    <?php if (!empty($error_message)) { ?>
      <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if 
    ?>
    <form action="display_results.php" method="post">

      <div id="data">
        <label>Investment Amount:</label>
        <select name="investment" style="width: 200px; height: 40px;">
          <?php for ($i = (int) $investment; $i <= 50000; $i += 5000) : ?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>
          <?php endfor; ?>
        </select>
        <label>Yearly Interest Rate:</label>
        <select name="interest_rate" style="width: 200px; height: 40px;">
          <?php for ($x = (float)$interest_rate; $x <= 12; $x += 0.5) : ?>
            <option value="<?php echo $x ?>"><?php echo $x ?></option>
          <?php endfor; ?>
        </select>
        <label>Number of Years:</label>
        <input style="width: 180px;height:40px;" type="text" name="years" value="<?php echo $years; ?>" /><br>
      </div>

      <div id="buttons">
        <label>&nbsp;</label>
        <input type="submit" value="Calculate" /><br>
      </div>

    </form>
  </main>
</body>

</html>
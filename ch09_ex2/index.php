<?php
//set default values
$number1 = 78;
$number2 = -105.33;
$number3 = 0.0049;
$message = 'Enter some numbers and click on the Submit button.';

//process
$action = filter_input(INPUT_POST, 'action');
switch ($action) {
  case 'process_data':
    $number1 = filter_input(INPUT_POST, 'number1');
    $number2 = filter_input(INPUT_POST, 'number2');
    $number3 = filter_input(INPUT_POST, 'number3');

    // make sure the user enters three numbers
    if ($number1 == NULL || $number2 == NULL || $number3 == NULL) {
      $message = 'You must enter all 3 number!';
    }
    // make sure the numbers are valid
    else if (is_numeric($number1) || is_numeric($number2) || is_numeric($number3)) {
      $message = 'You must enter 3 number-type!';
    }
    // get the ceiling and floor for $number2
    $number2_ceil = ceil($number2);
    $number2_floor = floor($number2);
    // round $number3 to 3 decimal places
    $number3_rounded = round($number3, 3);
    // get the max and min values of all three numbers

    $max = max($number1, $number2, $number3);
    $min = min($number1, $number2, $number3);
    // generate a random integer between 1 and 100
    $random = rand(1, 100);
    $message =
      "Number 1: $number1\n" .
      "Number 2: $number2\n" .
      "Number 3: $number3\n" .
      "\n" .
      "Number 2 ceiling: $number2_ceil\n" .
      "Number 2 floor: $number2_floor\n" .
      "Number 3 rounded: $number3_rounded\n" .
      "\n" .
      "Min: $min\n" .
      "Max: $max\n" .
      "\n" .
      "Random: $random\n";

    break;
}
include 'number_tester.php';

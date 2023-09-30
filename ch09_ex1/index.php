<?php
//set default values
$name = '';
$email = '';
$phone = '';
$message = 'Enter some data and click on the Submit button.';

//process
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
  case 'process_data':
    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');

    if ($name == null || $email == null || $phone == null) {
      $message = 'Please enter full information!';
    }
    /*************************************************
     * validate and process the name
     ************************************************/
    // 1. make sure the user enters a name
    // 2. display the name with only the first letter capitalized
    trim($name);
    trim($email);
    trim($phone);

    $name = strtolower($name);
    $name = ucwords($name);
    $space_index = strpos($name, ' ');
    if ($space_index === NULL || $space_index === FALSE) {
      $main_name = $name;
    } else {
      $main_name = substr($name, 0, $space_index);
    }
    /*************************************************
     * validate and process the email address
     ************************************************/
    // 1. make sure the user enters an email
    // 2. make sure the email address has at least one @ sign and one dot character
    if (strpos($email, '@') === FALSE) {
      $message = 'Email must contain @';
      break;
    } else if (strpos($email, '.') === FALSE) {
      $message = 'Email must contain dot (.)';
      break;
    }

    /*************************************************
     * validate and process the phone number
     ************************************************/
    // 1. make sure the user enters at least seven digits, not including formatting characters
    // 2. format the phone number like this 123-4567 or this 123-456-7890
    $phone = str_replace('-', '', $phone);
    $phone = str_replace('(', '', $phone);
    $phone = str_replace(')', '', $phone);
    $phone = str_replace('.', '', $phone);
    $phone = str_replace(' ', '', $phone);
    if (strlen($phone) < 7) {
      $message = 'Phone number must contain at least 7 digits.';
      break;
    } else if (strlen($phone) == 7) {
      $part1 = substr($phone, 0, 3);
      $part2 = substr($phone, 3);
      $phone = $part1 . '-' . $part2;
    } else {
      $part1 = substr($phone, 0, 3);
      $part2 = substr($phone, 3, 3);
      $part3 = substr($phone, 6);
      $phone = $part1 . '-' . $part2 . '-' . $part3;
    }
    /*************************************************
     * Display the validation message
     ************************************************/
    $message = "
    Hello $main_name.\n" .
      "Thank you for entering this data:\n" .
      "Name: $name\n" .
      "Email: $email\n" .
      "Phone: $phone\n";
    break;
}
include 'string_tester.php';

<?php

$customer_type_pre = filter_input(INPUT_POST, 'type');
$customer_type = strtoupper($customer_type_pre);
$invoice_subtotal = filter_input(INPUT_POST, 'subtotal');
$discount_percent = 0;
switch ($customer_type) {
  case 'R':
    if ($invoice_subtotal >= 250 && $invoice_subtotal < 500) {
      $discount_percent = .25;
    } else if ($invoice_subtotal >= 500) {
      $discount_percent = 0.3;
    }
    break;
  case 'C':
    $discount_percent = 0.2;
    break;
  case 'T':
    if ($invoice_subtotal < 500) {
      $discount_percent = 0.4;
    } else if ($invoice_subtotal >= 500) {
      $discount_percent = 0.5;
    }
    break;
  default:
    $discount_percent = 0.1;
    break;
}
$discount_amount = $invoice_subtotal * $discount_percent;
$invoice_total = $invoice_subtotal - $discount_amount;

$percent = number_format(($discount_percent * 100));
$discount = number_format($discount_amount, 2);
$total = number_format($invoice_total, 2);

include 'invoice_total.php';

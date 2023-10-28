<?php
require('util/main.php');

require('model/database.php');
require('model/product_db.php');

/*********************************************
 * Select some products
 **********************************************/
$database = new Database();
$productDB = new ProductDB();
// Sample data
$cat_id = 1;

// Get the products
$products = $productDB->get_products_by_category($cat_id);

/***************************************
 * Delete a product
 ****************************************/

// Sample data
$product_name = 'Fender Telecaster 1';

$product_id = $productDB->get_product_id_by_name($product_name);
$result = $productDB->delete_product($product_id);
if ($result > 0) {
  $delete_message = "$result row has been deleted";
} else {
  $delete_message = "No rows were deleted.";
}
/***************************************
 * Insert a product
 ****************************************/

// Sample data
$category_id = 1;
$code = 'quan';
$name = 'Fender Telecaster 1';
$description = 'NA';
$price = '949.99';

// Insert the data
$insert_result = $productDB->add_product($cat_id, $code, $name, $description, $price, 0);
if ($insert_result > 0) {
  $insert_message = "1 row has been inserted with ID: $insert_result";
} else {
  $insert_message = "No rows were inserted.";
}

include 'home.php';

<?php
header('Content-Type: application/json');
session_start();
 

$_SESSION['product_cart'][]=$_POST['productIdtocart'];

$output=array(
  'success'=>true,
);
echo json_encode($output);
?>

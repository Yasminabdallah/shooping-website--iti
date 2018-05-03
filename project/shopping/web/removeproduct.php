<?php

header('Content-Type: application/json');
session_start();
 
if (isset($_SESSION['product_cart'])){
    $variable=$_POST['productIdselected'];
    $x=array_search($_SESSION['product_cart'], $variable);
   
    array_splice($_SESSION['product_cart'],$x,1);
    
}

$output=array(
  'success'=>true,
);
echo json_encode($output);
?>


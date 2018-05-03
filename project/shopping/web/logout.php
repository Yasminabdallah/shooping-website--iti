<?php
session_start();

 
     
   unset($_SESSION['product_cart']);
   unset($_SESSION['userId']);
   unset($_SESSION['username']);
   unset($_SESSION['category']);
   unset($_SESSION['UPDATE']);
   session_destroy();
   header('Location: home.php');
     
 

?>
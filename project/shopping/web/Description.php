
<?php
include '../classes/config.php';
include '../model/BaseEntity.php';
include '../model/User.php';
include '../model/Product.php';
include '../model/Products.php';
$conn;
session_start();

if(isset($_GET['productid']) && $_GET['productid']) 
    
{
$Products = new Products($conn);
$ProductsObj = $Products->getProductsbyId($_GET['productid']);
}
if(isset($_GET['id']) && $_GET['id']) 
{
 $Products = new Products($conn);
 $ProductsObj = $Products->getProductsbyId($_GET['id']); 
}
if(isset($_SESSION['UPDATE']) && $_SESSION['UPDATE']) 
{
 $Products = new Products($conn);
 $ProductsObj = $Products->getProductsbyId($_SESSION['UPDATE']); 
}

?>

<?php  if(!empty($ProductsObj)) : ?>
 <?php foreach ( $ProductsObj as $Product):?>
    <div class="product" align="center">
      <img src=<?= $Product->getPhoto()  ?> height="200" width="200"></img><br>  
      Name :<h3><?= $Product->getName() ?></h3>
     Description: <h3><?= $Product->getDescription() ?></h3>
     Price : <h3><?=  $Product->getPrice()?> LE</h3>  
      
     <a href="home.php"><button>Home</button></a>
    </div>
  
<?php endforeach; ?> 

<?php endif ?>



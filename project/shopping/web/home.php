
<?php
include '../classes/config.php';
include '../model/BaseEntity.php';
include '../model/User.php';
include '../model/Product.php';
include '../model/Products.php';
session_start();
unset($_SESSION['UPDATE']);

?>
<html>
    <head>
        <style>
            .product{
               float:left;
                width: 200px;
                display:inline-block; 
                margin:10px;
                border: 2px;
                align:center;

            }
        </style>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        
    
    
        <?php if(!isset($_SESSION['userId']) || !$_SESSION['userId']): ?>
        <a href="Login.php"><button>Login</button></a>
        <a href="Register.php"><button>Register</button></a>
         
        
         <?php else: ?> 
        <a href="Account.php"><button>Account</button></a>
        <a href="checkout.php"><button>Checkout</button></a>
        <a href="logout.php"><button>log out</button></a>
        <?php endif; ?>
        <br/>
        <br/>
        <input type="text" placeholder="search for product" id="searchproduct"/>
        <br/>
        <br/>
        <form method="post">
           <?php if(!isset($_SESSION['userId']) || !$_SESSION['userId']): ?>
            <a href="home.php?category=1"><button type ="button">Ipone</button></a>
            <a href="home.php?category=2"><button type ="button">Samsung</button></a> 
            <a href="home.php?category=3"><button type ="button">Nokia</button></a>
            <a href="home.php?category=5"><button type ="button">LG</button></a>
            <a href="home.php?category=4"><button type ="button">ALL</button></a>
           
             
         <?php elseif(isset($_SESSION['userId']) && $_SESSION['userId']==="1"):?> 
            <a href="home.php?category=1"><button type ="button">Ipone</button></a>
            <a href="home.php?category=2"><button type ="button">Samsung</button></a> 
            <a href="home.php?category=3"><button type ="button">Nokia</button></a>
            <a href="home.php?category=5"><button type ="button">LG</button></a>
            <a href="home.php?category=4"><button type ="button">ALL</button></a>
            <a href="Addproduct.php"><button type="button">Add product</button></a>  
       
         <?php else :?>
            <a href="home.php?category=1"><button type ="button">Ipone</button></a>
            <a href="home.php?category=2"><button type ="button">Samsung</button></a> 
            <a href="home.php?category=3"><button type ="button">Nokia</button></a>
            <a href="home.php?category=5"><button type ="button">LG</button></a>
            <a href="home.php?category=4"><button type ="button">ALL</button></a>
          <?php endif ?>
        </form>
         <br>
        
           
       
        
   
     <?php
        if (!empty($_GET['category'])){
            
        if ($_GET['category']=="4"){
            $Products = new Products($conn);
            $ProductsObj = $Products->getProductsAll();    
            }
        else{   
             $_SESSION['category']=$_GET['category'];
             $Products = new Products($conn);
             $ProductsObj = $Products->getProducts($_GET["category"]);
         }
        }
        else{
            $Products = new Products($conn);
            $ProductsObj = $Products->getProductsAll();
        }
        ?>
         <?php
   if(!empty($_POST['delete']))
        {
       var_dump($_POST['delete']);
    $productselected=new Product($conn,false,$_POST['delete']);
    
    $productselected->delete();
    
    header("Location: home.php");
    exit;
     }
     

       ?>
  <?php if(!empty($ProductsObj)):?>
               
             
 <?php foreach ( $ProductsObj as $Product):?>
       <div class="product" >
 <?php if(!isset($_SESSION['userId']) || !$_SESSION['userId']): ?>
  <img src=<?= $Product->getPhoto()  ?> height="200" width="200"></img><br>
   Name :<h3><?= $Product->getName() ?></h3>
   Price:<h3> <?= $Product->getPrice() ?>LE</h3>
   <h3> <?= substr($Product->getDescription(), 0, 100) ?></h3>
   <a href="Description.php?productid=<?= $Product->getProductId();?>"><button id="nameproduct"><?= $Product->getName() ?>More details</button></a>
                    
   <?php elseif(isset($_SESSION['userId']) && $_SESSION['userId']=="1"):?> 
   <img src=<?= $Product->getPhoto()  ?> height="200" width="200"></img><br>
   Name :<h3><?= $Product->getName() ?></h3>
   Price :<h3> <?= $Product->getPrice()  ?>LE</h3>
   <h3> <?= substr($Product->getDescription(), 0, 100)  ?></h3>
   <a href="Description.php?productid=<?= $Product->getProductId();?>"><button id="nameproduct"><?= $Product->getName() ?>More details</button></a>
   <a href="Updateproduct.php?productidforupdate=<?= $Product->getProductId();?>"><button id="nameproduct"> Update this product</button></a>
   <button  class="cartAdd" type="button" value="<?= $Product->getProductId();?>">Add to cart</button>   
   <form method="post" > <a href="home.php"><button type="submit" name="delete" value="<?= $Product->getProductId();?>">delete</button></a></form>
    <?php else: ?> 
   <img src=<?= $Product->getPhoto()  ?> height="200" width="200"></img><br>
   Name :<h3><?= $Product->getName() ?></h3>
   Price :<h3> <?= $Product->getPrice()  ?>LE</h3>
   <h3> <?= substr($Product->getDescription(), 0, 100)  ?></h3>
   <a href="Description.php?productid=<?= $Product->getProductId();?>"><button id="nameproduct"><?= $Product->getName() ?>More details</button></a>
   <button  class="cartAdd" type="button" value="<?= $Product->getProductId();?>">Add to cart</button>
    <form method="post" > <a href="home.php"><button type="submit" name="delete" value="<?= $Product->getProductId();?>">delete</button></a></form>
 <?php endif; ?>
                    
                </div>
                
            <?php endforeach; ?> 
       <?php endif; ?>
        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="/js/search.js"></script>
        <script>
 $(function () {
  
    $(".cartAdd").click(function () {
        
        $.ajax({
            url: 'addtocart.php',
            type: 'post',
            data: {productIdtocart: $(this).val()},
            success: function (response) {
                console.log(response);
                
                if (response.success == true) {
                    console.log("done");
                    
                   
                }
            }
        });


    });

    
});

        
    </script>
</head>
</html>



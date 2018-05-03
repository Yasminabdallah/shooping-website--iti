<?php
include '../classes/config.php';
include '../model/BaseEntity.php';
include '../model/Products.php';
include '../model/Product.php';


session_start();
?>

<html>
    <body>
        <style>
              .button {
    background-color: green;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
}
 .remove  {
    background-color: red;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
}
        </style>
<?php
$totalPrice = 0;
if (!isset($_SESSION['userId']) || !$_SESSION['userId']) {
    header("Location: login.php");
    exit;
} else {
    if (!empty($_SESSION['product_cart'])) {

       
        $pObj = array();
        
       foreach ($_SESSION['product_cart']as $productsnumbers => $productnumber) {

            $pObjs = new products($conn);
            $product = $pObjs->getProductsById((int) $productnumber);
            foreach ($product as $products) {
                ?>
        <div><span><?=$products->getName() ?></span>
        Price :<span  value="<?= $products->getPrice() ?>" class="price"><?=$products->getPrice() ?></span>
        <?php $totalPrice+=$products->getPrice()?>
       <button class="remove "value="<?= $products->getProductId()?>">Remove</button>
        </div>
        <br/>
        <?php
            }
            
        }
        ?>
        Total price :<span class="totalprice" value ="<?= $totalPrice ?>"><?php echo$totalPrice ?></span>
        <?php
    }
    
    else {?>
        <h3 align="center"> You don't have any product in your cart </h3>
        </br>
        </br>
     <?php
    }
}
?>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        
      <script>
          
          $(function(){
        $(".remove").click(function () {
        var removeddiv=$(this).parent();
        var priceSpan=removeddiv.find(".price").attr("value");
        var totalSpan=$(".totalprice").html();
        
        var newtotalprice=totalSpan-priceSpan;
        
       
        $.ajax({
            url: 'removeproduct.php',
            type: 'post',
            data: {productIdselected: $(this).val()},
            success: function (response) {
                console.log(response);
                
                if (response.success == true) {
                   
                   $(".totalprice").html("");
                    $(".totalprice").html(newtotalprice);
                   removeddiv.remove();
                   
                   
                }
            }
        });


    });

          });
          
          
         
        
        </script>   
       
        <br/>
        <br/>
        <a href="home.php"><button class="button">Home</button></a>
    </body>
</html>

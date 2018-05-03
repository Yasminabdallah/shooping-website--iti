<?php
include '../classes/config.php';
include '../model/BaseEntity.php';

include '../model/Product.php';
include '../model/Products.php';
$conn;
session_start();
$errorUsername = $errorDescription = "";
if(!empty($_POST['update']))
{
    $filename = $_FILES['photo']['tmp_name'];
    $filePath = '/uploads/' . time() . '.jpg';
    $destination = __DIR__ . $filePath;
    if(!move_uploaded_file($filename, $destination))
    {
        die('cant upload');
    }
    
    if(!isset($_POST['name']) || !$_POST['name'])
    {
        $errorUsername .= "This Field required.";
    }
    else
    {
        if(strlen($_POST['name']) > 20 || strlen($_POST['name']) < 5)
        {
            $errorUsername .= "Max Legth is 20Char AND Min Length 6";
        }
       
    }
    if(!isset($_POST['description']) || !$_POST['description'])
    {
        $errorUsername .= "This Field required.";
    }
    else
    {
        if(strlen($_POST['description']) > 255 || strlen($_POST['description']) < 5)
        {
            $errorUsername .= "Max Legth is 255Char AND Min Length 6";
        }
       
    }
 if($errorDescription == "" && $errorUsername == "")
    {

    $x=(int)$_GET['productidforupdate'];
    $_SESSION['UPDATE']=$x;
    $productselected=new Product($conn,false,$x);
    
    $productselected->setPhoto($filePath);
    $productselected->setName($_POST['name']);
    $productselected->setPrice($_POST['price']);
    $productselected->setDescription($_POST['description']);
    $productselected->setCatId($_POST['cat_id']);
    
    $productselected->update();
    
   header("Location: Description.php");
   exit;
    }
}


if(isset($_GET['productidforupdate']) && $_GET['productidforupdate']) 
{
    $Products = new Products($conn);
    $ProductsObj = $Products->getProductsbyId($_GET['productidforupdate']);
    
 
}

?>
<?php  if(!empty($ProductsObj)) : ?>
 <?php foreach ( $ProductsObj as $productadd):?>
<form method="post" enctype="multipart/form-data">
    
    <br/>
    Should select product photo<input type="file" name="photo" id="fileToUpload">
    <br/>
    Name of product <input name="name" value="<?= $productadd->getName()?>" />
    <br/>
    <br/>
    Price of product <input name="price"  value="<?= $productadd->getPrice()?>"/>
    <br/>
    <?php echo $errorUsername ?>
    <br/>
    Descriptopn of product <input name="description"  value="<?= $productadd->getDescription()?>"/>
    <br/>
    <?php echo $errorDescription ?>
    <br/>
    Category Id <input name="cat_id" value="<?= $productadd->getCatId()?>" />
    <br/>
    <br/>
    
    <br/>
    <br/>
    <button type="submit" name="update" value ="<?=$_GET['productidforupdate']?>">Update</button>
    
</form>

<?php endforeach; ?> 

<?php endif ?>


        
<?php
include '../classes/config.php';
include '../model/BaseEntity.php';
include '../model/Product.php';
session_start();


if(!empty($_POST))
{
    $filename = $_FILES['photo']['tmp_name'];
    $filePath = '/uploads/' . time() . '.jpg';
    $destination = __DIR__ . $filePath;
    if(!move_uploaded_file($filename, $destination))
    {
        die('cant upload');
    }
    $productadd=new Product($conn, $_POST);
    $productadd->setPhoto($filePath);
    //var_dump($_POST);
    //print_r($productadd);
    
    $productadd->insert();

    header("Location: home.php");
    exit;
}
?>
<form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="photo" id="fileToUpload">
    <br/>
    <br/>
    Name of product <input name="name"  />
    <br/>
    <br/>
    Price of product <input name="price" />
    <br/>
    <br/>
    Descriptopn of product <input name="description"  />
    <br/>
    <br/>
    Category Id <input name="cat_id" />
    <br/>
    <br/>
   
    <br/>
    <br/>
    <button type="submit">Add new Product</button>
 
</form>
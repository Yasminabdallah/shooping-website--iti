<?php

class Product extends BaseEntity
{
    public $catId;
    public $productId;
    public $name;
    public $description;
    public $price;
    public $photo;
    
    public function __construct($conn, $productArray=false,$productId=false)
    {
             
        $this->conn = $conn;
        
        if ($productArray){
        $this->productId= $productArray['product_id'];
        $this->name = $productArray['name'];
        $this->description = $productArray['description'];
        $this->price = $productArray['price'];
        $this->photo=$productArray['photo'];
        $this->catId=$productArray['cat_id'];
        }
        if ($productId){
             
            $this->productId=$productId;
            $query = "SELECT * FROM `product` WHERE `product`.`product_id`={$this->productId}";
            $result = $this->conn->query($query);
           
            
            if($result->num_rows > 0)
            {
                // output data of each row
                $row = $result->fetch_assoc();
                foreach($row as $key => $value)
                {
                    $this->$key = $value;
                }
              
            }
            else
            {
                die('Product Not Found');
            }
        }
            
            
        
    }
   public function insert()
    {
        $query = "INSERT INTO `product` (`product_id`,`name`,`description`, `price`,`photo`,`cat_id`) "
                . "VALUES (NULL, '{$this->getName()}','{$this->getDescription()}', '{$this->getPrice()}', '{$this->getPhoto()}','{$this->getCatId()}');";

        mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
       
    }
    
     public function update( )
    {
         
        $query = "UPDATE `product` SET `name` ='{$this->getName()}',`description` ='{$this->getDescription()}',`price` ='{$this->getPrice()}',`cat_id` ='{$this->getCatId()}',`photo`='{$this->getPhoto()}' WHERE `product`.`product_id` ={$this->productId}";
    
        mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
    }
    public function delete()
    {
        $query = "DELETE FROM `product` WHERE `product`.`product_id` = {$this->productId}";
         echo "hello";
        mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
    }
   

}
<?php

$conn;

/**
 * @method User setUsername(String $username) Description: This set username property
 * @method User getUsername() Description: This get username value
 */
class User extends BaseEntity
{

    public $id;
    public $username;
    public $password;
    public $phone;
    public $email;
    public $key;
   

    public function __construct($conn, $userId = false)
    {
        
         $this->conn = $conn;
        if($userId)
        {
            $query = "SELECT * FROM user WHERE id={$userId}";
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
                die('User Not Found');
            }
        }
       
    }

   
     public function save()
    {
       
        $query = "INSERT INTO `user` (`id`,`username`, `email`, `password`, `phone`) "
                . "VALUES (NULL, '{$this->getUsername()}','{$this->getEmail()}', '{$this->getPassword()}', '{$this->getPhone()}');";

        mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
        $this->id = mysqli_insert_id($this->conn);
        return $this->id;
    }

    public function update()
    {
        $query = "UPDATE `user` SET `username`='{$this->getUsername()}', `phone` = '{$this->getPhone()}',`email` = '{$this->getEmail()}' WHERE `user`.`id` = {$this->id}";
        mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
    }

    public function delete()
    {
        $query = "DELETE FROM `user` WHERE `user`.`id` = {$this->id}";
        mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
    }

}



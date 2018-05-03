<?php
$conn;
include '../classes/config.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);


$error = "";
if(!empty($_POST))
{
    // $_POST['username'] $_POST['password']
    if(!isset($_POST['username']) || !$_POST['username'])
    {
      
        $error .= "No Username given<br>";
    }

    if(!isset($_POST['password']) || !$_POST['password'])
    {

        $error .= "No Password given<br>";
    }

    //Success $_POST['username'] $_POST['password']
    if($error == "")
    {
         $loggedIn = false;
         
          $usernameofuser=$_POST['username'];
          $passwordofuser=$_POST['password'];
        
        $query="SELECT * FROM `user` WHERE `username` LIKE '{$usernameofuser}' AND `password` LIKE '{$passwordofuser}' ";
        
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $count= mysqli_num_rows($result);
        $resulttwo = $conn->query($query);
        $row = $resulttwo->fetch_assoc();
        $userId= $row['id'];
        if ($count == 1)
            {
       session_start();
       $_SESSION['username'] = $usernameofuser;
       $_SESSION['userId']=$userId;
       var_dump($_SESSION['userId']);
        $loggedIn = true;
         }else
             {

        $fmsg = "Invalid Login Credentials.";
         }
       }
   
       if($loggedIn)
        {
            
            header('Location: home.php');
            exit;
        }
        else
        {
           
            $error .= "Erorr username and password";
        }
    }
    
?>
<style>
    .error{
        color: red;
    }
</style>
<h1 align="center">Please Login to your account</h1>
<div class="error">
    <?php echo $error ?>
</div>
<div align="center">
<form method="post" >
    username :<input name="username" type="text" />
    <br/>
    <br/>
    password <input name="password" type="password" />
    <br/>
    <br/>
    <button type="submit">Login</button>
</form>
</div>


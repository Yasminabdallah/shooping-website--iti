<?php
include '../classes/config.php';
include '../model/BaseEntity.php';
include '../model/User.php';

session_start();
$userId = $_SESSION['userId'];

$user = new User($conn, $userId);

if(!empty($_POST))
{
    
    
    $user->setUsername($_POST['username']);
    $user->setPhone($_POST['phone']);
    $user->setEmail($_POST['email']);
    $user->update();

    header("Location: Account.php");
    exit;
}
?>
<form method="post" align=" center" enctype="multipart/form-data">
    
    <br/>
    Username<input name="username" value="<?= $user->getUsername() ?>" />
    <br/>
    Email<input name="email" value="<?= $user->getEmail() ?>" />
    <br/>
    Phone<input name="phone" value="<?= $user->getPhone() ?>" />
    <br/>
   <br/>
   <br/>
    <button  class=" button" type="submit">Edit</button>
</form>


<html>
    <body>
        <style>
            input{
                 width: 20%;
                  padding: 12px 20px;
                   margin: 8px 10px;
                    box-sizing: border-box;
                    border-bottom: 2px solid black;
            }
            .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
        </style>
    </body>
</html>

<?php
include '../classes/config.php';
include '../model/BaseEntity.php';
include '../model/User.php';

session_start();

if(!isset($_SESSION['userId']) || !$_SESSION['userId'])
{
    header("Location: Login.php");
    exit;
}
$userId = $_SESSION['userId'];

$user = new User($conn, $userId);

?>
<div  align="center">
<h1>Logged In User Info</h1>
 
<div id ="account">
<h4> Name: <?= $user->getUsername() ?></h3>
<h4> Email: <?= $user->getEmail() ?></h3>
<h4> Phone: <?= $user->getPhone() ?></h3>
<a href="Editprofile.php"><button class ="button">Edit Ptofile</button></a>
<a href="home.php"><button  class="button">Home</button></a>
</div>
</div>
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




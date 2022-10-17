<?php


include_once("../../connection/connection.php");
include_once("../../utils/hash.php");

if(isset($_POST['update'])){

    $user_id = $_POST['id'];
    $name = strtoupper($_POST['name']);
    $email = $_POST['email'];
    $password = $_POST['password'];

    $passHash = getHashPassword($password);

    $sqlUpdate = "UPDATE tb_user SET user_name = '$name', user_email = '$email', user_password = '$passHash', updateAt = NOW() 
    WHERE user_id = '$user_id'";

    $result = $conn -> query($sqlUpdate);

}

header('Location: ../index.php');



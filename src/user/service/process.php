<?php

include_once("../../connection/connection.php");
include_once("../../utils/hash.php");


$name = strtoupper($_POST['name']);
$email = $_POST['email'];
$password = $_POST['password'];




$pass_hash = getHashPassword($password);

$sql_insert_user = "INSERT INTO tb_user (user_name, user_email, user_password, createAt,updateAt) VALUES ('$name', '$email', '$pass_hash', NOW(),NOW())";

$result = mysqli_query($conn, $sql_insert_user);

if(mysqli_insert_id($conn)){
    header("Location: ../index.php");
} else {
    header("Location: ../index.php");
}

?>
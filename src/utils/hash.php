<?php


function getHashPassword($pass){
    $options = [
        'cost' => 10,
    ];
    
   return password_hash($pass, PASSWORD_DEFAULT, $options);
}



?>
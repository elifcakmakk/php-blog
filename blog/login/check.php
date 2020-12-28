<?php
require '../../config/database.php';
session_start();

if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $db->query("SELECT * FROM users WHERE email = '{$email}' and password = '{$password}'")
        ->fetch(PDO::FETCH_ASSOC);
    if ($query) {
        
        //echo "Hoşgeldin";
        
        $_SESSION["login"] = true;
        $_SESSION["email"] = $email;
      
        echo "session oluşturuldu";
        header("Location: ../home/index.php");
        die();

    } else {
        header("Location: index.php");
    }

}

header("Location: index.php");
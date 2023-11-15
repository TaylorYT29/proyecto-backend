<?php
    //var_dump($_POST);
    /*

    */
    require_once 'database.php';
    // Reference: https://medoo.in/api/insert
    if($_POST){
        $database->insert("tb_users",[
            "username"=> $_POST["user"],
            "password"=> $_POST["password"],
            "email"=> $_POST["email"]
        ]);
    }
    
?>
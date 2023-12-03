<?php
require_once '../database.php';
$message = "";

if ($_POST) {
    if (isset($_POST["login"])) {

        $user = $database->select("tb_admin", "*", [
            "admin_name" => $_POST["admin_name"]
        ]);

        if (count($user) > 0) {
            if (password_verify($_POST["admin_password"], $user[0]["admin_password"])) {
                session_start();
                $_SESSION["isLoggedIn"] = true;
                $_SESSION["admin_name"] = $user[0]["admin_name"];
                header("location: ./admin-action.php");
                exit();
            } else {
                $message = "Wrong username or password";
            }
        } else {
            $message = "Wrong username or password";
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administrator</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <form method="post" action="admin-action.php">
            <div class="container">
                <div class="card-register">
                    <a class="login">Login</a>
                    <div class="inputBox">
                        <label for="admin_name"></label>
                        <input id="admin_name" name="admin_name" type="text" required="required">
                        <span>Username</span>
                    </div>

                    <div class="inputBox">
                        <label for="admin_password"></label>
                        <input id="admin_password" name="admin_password" type="admin_password" required="required">
                        <span>Password</span>
                    </div>

                    <button class="enter" name="login" type="submit">Login</button>
                </div>

    
</body>
</html>
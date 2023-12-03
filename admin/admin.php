<?php
require_once '../database.php';
$message = "";

if ($_POST) {
    if (isset($_POST["login"])) {

        $user = $database->select("tb_users", "*", [
            "username" => $_POST["username"]
        ]);

        if (count($user) > 0) {
            if (password_verify($_POST["password"], $user[0]["password"])) {
                session_start();
                $_SESSION["isLoggedIn"] = true;
                $_SESSION["fullname"] = $user[0]["username"];
                header("location: admin-action.php");
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
<form method="post" action="admin.php">
            <div class="container">
                <div class="card-register">
                    <a class="login">Login</a>
                    <div class="inputBox">
                        <label for="username"></label>
                        <input id="username" name="username" type="text" required="required">
                        <span>Username</span>
                    </div>

                    <div class="inputBox">
                        <label for="password"></label>
                        <input id="password" name="password" type="password" required="required">
                        <span>Password</span>
                    </div>

                    <button class="enter" name="login" type="submit">Login</button>

                </div>
                
            </div>
        </form>

    
</body>
</html>
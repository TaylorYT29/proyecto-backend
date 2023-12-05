<?php
require_once './database.php';
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
                header("location: index.php");
                exit();
            } else {
                $message = "Wrong username or password";
            }
        } else {
            $message = "Wrong username or password";
        }
    }

    if (isset($_POST["register"])) {
        $validateUsername = $database->select("tb_users", "*", [
            "username" => $_POST["username"]
        ]);

        if (count($validateUsername) > 0) {
            $message = "This username is already registered";
        } else {
            if (empty($_POST["email"])) {
                $message = "Email is required for registration";
            } else {
                $pass = password_hash($_POST["password"], PASSWORD_DEFAULT, ['cost' => 12]);

                $database->insert("tb_users", [
                    "username" => $_POST["username"],
                    "password" => $pass,
                    "email" => $_POST["email"]
                ]);
                $message = "Registration successful!";
            }
        }
    }

    if (isset($_POST["send_code"])) {
        $email = $_POST["email"];
        $user = $database->select("tb_users", "*", ["email" => $email]);

        if (count($user) > 0) {
            $resetCode = bin2hex(random_bytes(16));

            $database->update("tb_users", ["reset_code" => $resetCode], ["email" => $email]);

            $to = $email;
            $subject = "Password Reset Code";
            $message = "Your password reset code is: $resetCode";

            require 'email.php';
            header("location: reset_password.php?email=$email&reset_code=$resetCode");
            exit();

        } else {
            $message = "Email not found";
        }
    }

    if (isset($_POST["recover"])) {
        $email = $_POST["email"];
        $code = $_POST["code"];
        $user = $database->select("tb_users", "*", ["email" => $email, "reset_code" => $code]);

        if (count($user) > 0) {
            header("location: reset_password.php?email=$email&reset_code=$code");
            exit();
        } else {
            $message = "Invalid email or verification code";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <section class="dish-container">
        <form method="post" action="forms.php">
            <div class="container">
                <div class="card-register">
                    <a class="login">Register</a>
                    <div class="inputBox">
                        <label for="username"></label>
                        <input id="username" name="username" type="text" required="required">
                        <span>Username</span>
                    </div>

                    <div class="inputBox">
                        <label for="email"></label>
                        <input id="email" name="email" type="text" required="required">
                        <span>Email</span>
                    </div>

                    <div class="inputBox">
                        <label for="password"></label>
                        <input id="password" name="password" type="password" required="required">
                        <span>Password</span>
                    </div>

                    <button class="enter" name="register" type="submit">Register</button>

                </div>
                <p>
                    <?php echo $message; ?>
                </p>
            </div>
        </form>
        <form method="post" action="forms.php">
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

                    <p><a href="forgot_password.php">Forgot Password?</a></p>
                </div>
                <p>
                    <?php echo $message; ?>
                </p>
            </div>
        </form>
        </div>
    </section>
</body>

</html>
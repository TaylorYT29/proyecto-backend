<?php

/*
This file handles the password reset process. It retrieves the email and reset code
from the query parameters or the form submission. It validates the combination of email and
reset code against the database and displays a password reset form if the combination is valid.
*/

require_once './database.php';

// Retrieve email and reset code from the query parameters or form submission
$email = isset($_GET["email"]) ? $_GET["email"] : "";
if (isset($_GET["reset_code"])) {
    $resetCode = $_GET["reset_code"];
} elseif (isset($_POST["reset_code"])) {
    $resetCode = $_POST["reset_code"];
} else {
    $resetCode = "";
}

// Check if the email and reset code combination exists in the database
$user = $database->select("tb_users", "*", ["email" => $email, "reset_code" => $resetCode]);

// If the combination is valid, display the password reset form
if (count($user) > 0) {
    ?>
    <link rel="stylesheet" href="./css/main.css">
    <form method="post" action="update_password.php">
        <div class="container">
            <div class="card-register">
                <a class="login">Reset Password</a>
                <div class="inputBox">
                    <label for="password"></label>
                    <input id="new_password" name="new_password" type="password" required="required">
                    <span>New Password</span>
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="reset_code" value="<?php echo $resetCode; ?>">
                    <button class="enter" name="change password" type="submit">Change Password</button>
                </div>
            </div>
        </div>
    </form>
    <?php
} else {
    echo "Código de restablecimiento no válido.";
}

var_dump($resetCode);
var_dump($user);
?>
<?php
require_once './database.php';

$email = isset($_GET["email"]) ? $_GET["email"] : "";
if (isset($_GET["reset_code"])) {
    $resetCode = $_GET["reset_code"];
} elseif (isset($_POST["reset_code"])) {
    $resetCode = $_POST["reset_code"];
} else {
    $resetCode = "";
}

$user = $database->select("tb_users", "*", ["email" => $email, "reset_code" => $resetCode]);

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
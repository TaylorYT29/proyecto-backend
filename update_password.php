<?php

/*
This file handles the password update process. It expects a POST request containing
the user's email, reset code, and the new password. It verifies the provided email and reset
code against the "tb_users" table in the database. If the combination is valid, it updates
the user's password with the hashed new password and clears the reset code.
*/

require_once './database.php';

if ($_POST) {
    $email = $_POST["email"];
    $resetCode = $_POST["reset_code"];
    $newPassword = password_hash($_POST["new_password"], PASSWORD_DEFAULT, ['cost' => 12]);

    $user = $database->select("tb_users", "*", ["email" => $email, "reset_code" => $resetCode]);

    if (count($user) > 0) {
        $database->update("tb_users", ["password" => $newPassword, "reset_code" => null], ["email" => $email, "reset_code" => $resetCode]);
        echo "Password updated successfully!";
    } else {
        echo "Código de restablecimiento no válido.";
    }
}
?>

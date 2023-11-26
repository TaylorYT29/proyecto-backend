<?php
require_once './database.php';

if ($_POST) {
    $email = $_POST["email"];
    $resetCode = $_POST["reset_code"];
    $newPassword = password_hash($_POST["new_password"], PASSWORD_DEFAULT, ['cost' => 12]);

    // Verifica nuevamente si el código de restablecimiento es válido
    $user = $database->select("tb_users", "*", ["email" => $email, "reset_code" => $resetCode]);

    if (count($user) > 0) {
        // Update the user's password in the database
        $database->update("tb_users", ["password" => $newPassword, "reset_code" => null], ["email" => $email, "reset_code" => $resetCode]);

        echo "Password updated successfully!";
    } else {
        // Código de restablecimiento no válido, muestra un mensaje de error
        echo "Código de restablecimiento no válido.";
    }
}
?>

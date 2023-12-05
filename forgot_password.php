<?php

/*
This file handles the password recovery process. It verifies the provided email,
generates a reset code, and sends it to the user's email address for verification.

The script relies on 'database.php' file and 'email.php' file for database
access and email functionality.

*/

require_once './database.php';
$message = "";

if ($_POST && isset($_POST["send_code"])) {
    $email = $_POST["email"];

    $user = $database->select("tb_users", "*", ["email" => $email]);

    // If the email exists, generate a reset code and proceed with the recovery process
    if (count($user) > 0) {
        // Generate a random reset code
        $resetCode = bin2hex(random_bytes(16));

        session_start();
        $_SESSION["reset_code"] = $resetCode;
        $_SESSION["email"] = $email;

        $database->update("tb_users", ["reset_code" => $resetCode], ["email" => $email]);

        $to = $email;
        $subject = "Password Reset Code";
        $message = "Your password reset code is: $resetCode";

        require 'email.php';

        header("location: verify_code.php");
        exit();
    } else {
        $message = "Email not found";
    }
}
?>
<link rel="stylesheet" href="./css/main.css">
<title>Password Recovery</title>
</head>
<body>
    <section class="dish-container">
        <div class="activities-container"></div>
        <form method="post" action="forgot_password.php">
            <div class="container">
                <div class="card-register">
                    <a class="login">Password Recovery</a>
                    <div class="inputBox">
                        <label for="email"></label>
                        <input id="email" name="email" type="text" required="required">
                        <span>Email</span>
                    </div>
                    <button class="enter" name="send_code" type="submit">Send Verification Code</button>
                </div>
                <p>
                    <?php echo $message; ?>
                </p>
            </div>
        </form>
    </section>
</body>

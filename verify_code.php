<?php

/*
This PHP script handles the verification code submission process. It expects a POST request
containing the verification code entered by the user. The file validates the submitted code
against the code stored in the session. If the code is valid, it retrieves the associated email
and checks for a matching user in the database. If a match is found, the user is redirected to
the password reset page.
*/


require_once './database.php';
$message = "";

session_start();

if ($_POST && isset($_POST["verify_code"])) {
    $code = $_POST["code"];

    if (isset($_SESSION["reset_code"]) && $_SESSION["reset_code"] === $code) {
        $email = $_SESSION["email"];
        $user = $database->select("tb_users", "*", ["email" => $email, "reset_code" => $code]);

        if (count($user) > 0) {
            header("location: reset_password.php?email=$email&reset_code=$code");
            exit();
        } else {
            $message = "Invalid email or verification code";
        }
    } else {
        $message = "Invalid verification code";
    }
}
?>
<link rel="stylesheet" href="./css/main.css">
<title>Verification Code</title>
</head>
<body>
    <section class="dish-container">
        <div class="activities-container"></div>
        <form method="post" action="verify_code.php">
            <div class="container">
                <div class="card-register">
                    <a class="login">Verification Code</a>
                    <div class="inputBox">
                        <label for="code"></label>
                        <input id="code" name="code" type="text" required="required">
                        <span>Verification Code</span>
                    </div>
                    <button class="enter" name="verify_code" type="submit">Verify Code</button>
                </div>
                <p>
                    <?php echo $message; ?>
                </p>
            </div>
        </form>
    </section>
</body>

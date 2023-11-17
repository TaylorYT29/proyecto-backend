<?php
require_once './database.php';
$message = "";

if ($_POST) {

    if (isset($_POST["login"])) {

        $user = $database->select("tb_users", "*", [
            "username" => $_POST["username"]
        ]);

        if (count($user) > 0) {
            //validate password
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
        // validate if user is already registered
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

                // header("location: book.php?id=".$_POST["register"]);
                $message = "Registration successful!";
            }
        }
    }
}
?>
<link rel="stylesheet" href="./css/main.css">
<title>User Registration</title>
</head>

<body>
    
    <section class="destinations-container">
        <div class="activities-container"></div>
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
                    <p><?php echo $message; ?></p>
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

                    </div>
                    <p><?php echo $message; ?></p>
                </div>
            </form>
        </div>
    </section>
</body>

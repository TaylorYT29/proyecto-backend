
<link rel="stylesheet" href="./css/main.css">
    <title>User Registration</title>
</head>

<body>
<form method="post" action="response.php">
<div class="container">
        <div class="card-register">
            <a class="login">Register</a>
            <div class="inputBox">
                <label for="user"></label>
                <input name="user" type="text" required="required">
                <span>Username</span>
            </div>

            <div class="inputBox">
                <label for="email"></label>
                <input name="email" type="text" required="required">
                <span>Email</span>
            </div>

            <div class="inputBox">
                <label for="password"></label>
                <input name="password" type="password" required="required">
                <span>Password</span>
            </div>

            <button class="enter">Enter</button>
            
        </div>
    </div>
</form>

</body>

</html>
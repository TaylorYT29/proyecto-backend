<header>
        <nav class="top-nav">
            <a href=""><img class="logo-img" src="./imgs/identificador grafico proyecto.svg" alt=""></a>
            <input type="checkbox" class="mobile-check" id="check">
            <label class="mobile-btn" for="check">
                <span></span>
            </label>

            <ul class="navigation">
                <li><a class="nav-list-link" href="./index.php">Home</a></li>
                <li><a class="nav-list-link" href="./categories.php">Categories</a></li>
                <li><a class="nav-list-link" href="./delivery.php">Delivery</a></li>
                <li><a class="nav-list-link" href="./about-us.php">About Us</a></li>
                <li><a class="nav-list-link" href="./Contact-us.php">Contact us</a></li>
                <li><a class="nav-list-icon" href="#"><img class="icon" src="./imgs/vector-find-icon.svg"
                            alt="Find"></a></li>
                <li><a class="nav-list-icon" href="./shopping.php"><img class="icon"
                            src="./imgs/shopping-cart-icon-isolated-on-white-background-free-vector.svg"
                            alt="Shopping"></a></li>
                <?php 
                    session_start();
                    if(isset($_SESSION["isLoggedIn"])){
                        echo "<li><a class='nav-list-link' href='./profile.php'>".$_SESSION["fullname"]."</a></li>";
                        echo "<li><a class='nav-list-link' href='./logout.php'>Logout</a></li>";
                    }else{
                        echo "<li><a class='nav-list-link' href='./forms.php'>Login</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </header>
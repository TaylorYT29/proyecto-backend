<?php
    require_once './database.php';
    // Reference: https://medoo.in/api/select
    $items = $database->select("tb_dish_information","*",["isFeatured"=>"1"]);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&family=Poppins&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <?php 
        include "./parts/header.php"
    ?>
    <h1 class="hero-title">Jägermeister's Tisch</h1>
    <div class="carousel-container">
            <div class="carousel-slide">
                <?php 
                   foreach($items as $item){   
                        echo "<img class='carousel-item' src='./imgs/".$item["image"]."' alt='".$item["name"]."'>"; 
                    } 
                ?>
            </div>
            <button id="prevBtn" class="carousel-button prev-button">
                <img src="./imgs/left-arrow.svg" alt="Previous">
            </button>
            <button id="nextBtn" class="carousel-button next-button">
                <img src="./imgs/right-arrow.svg" alt="Next">
            </button>
        </div>
        <script src="./js/main.js"></script>
    <main>
        <h2 class="second-title">Featured</h2>
        <div class="recipe-container">

            <?php
                    foreach($items as $item){
                        echo "<section class='recipe'>";
                        echo "<div class='recipe-thum'>";
                        echo "<img class='recipe-image' src='./imgs/".$item["image"]."' alt='".$item["name"]."'>";
                        echo "</div>";
                        echo "<h3 class='recipe-title'>".substr($item["name"],0,30)."...</h3>";
                        echo "<p class='recipe-price'>$".$item["price"]."</p>";
                        echo "<a class='btn-add' href='description.php?id=".$item["id_dish_information"]."'>View Details</a>";
                        echo "</section>";
                    }
                ?>

        </div>

        <h2 class="second-title">Categories</h2>

        <div class="categories-container">
            <a class="link-categories" href="./categories-entrees.php">
                <section class="categories">
                    <div class="categories-thumb">
                        <img class="categories-image" src="./imgs/Entrees-img.jpg" alt="">
                    </div>
                    <h3 class="categories-title">Entrees</h3>
                </section>
            </a>

            <a class="link-categories" href="./categories-main.php">
                <section class="categories">
                    <div class="categories-thumb">
                        <img class="categories-image" src="./imgs/Main Dishes-img.jpg" alt="">
                    </div>
                    <h3 class="categories-title">Main Dishes</h3>
                </section>
            </a>

            <a class="link-categories" href="./categories-desserts.php">
                <section class="categories">
                    <div class="categories-thumb">
                        <img class="categories-image" src="./imgs/Desserts-img.jpg" alt="">
                    </div>
                    <h3 class="categories-title">Desserts</h3>
                </section>
            </a>

            <a class="link-categories" href="./categories-drinks.php">
                <section class="categories">
                    <div class="categories-thumb">
                        <img class="categories-image" src="./imgs/Drinks-img.jpg" alt="">
                    </div>
                    <h3 class="categories-title">Drinks</h3>
                </section>
            </a>
        </div>

        <div class="form-container">
            <section class="form-comments">
                <h2 class="form-title">Tell us how your experience has been</h2>
                <p>We would love to know your opinions and comments about our restaurant.</p>

                <form class="form" action="">
                    <input class="input-comments" type="text" placeholder="comments">
                    <input class="submit-btn" type="submit" value="Send">
                </form>
            </section>

            <div>
                <img class="form-image" src="./imgs/identificador grafico proyecto.svg" alt="">
            </div>

        </div>

    </main>
    <?php 
        include "./parts/footer.php"
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php 
        include "./parts/header.php"
    ?>
    <h2 class="second-title">Delivery</h2>

    <div class="delivery-container">
        <a class="link-delivery" href="">
            <section class="delivery">
                <div class="delivery-thumb">
                    <img class="delivery-image" src="./imgs/local.png" alt="">
                </div>
                <h3 class="delivery-title">lounge</h3>
            </section>
        </a>


        <a class="link-delivery" href="">
            <section class="delivery">
                <div class="delivery-thumb">
                    <img class="delivery-image" src="./imgs/express.png" alt="">
                </div>
                <h3 class="delivery-title">express</h3>
            </section>
        </a>

        <a class="link-delivery" href="">
            <section class="delivery">
                <div class="delivery-thumb">
                    <img class="delivery-image" src="./imgs/recoger.png" alt="">
                </div>
                <h3 class="delivery-title">Go to take away</h3>
            </section>
        </a> 
    </div>


    <h2 class="second-title">Featured</h2>
        <div class="recipe-container">
            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">
                    <!-- <button class="like-btn"><img src="" alt="Like"></button> -->
                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="#">ADD</a>
            </section>

            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">
                    <!-- <button class="like-btn"><img src="" alt="Like"></button> -->
                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="#">ADD</a>
            </section>

            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">
                    <!-- <button class="like-btn"><img src="" alt="Like"></button> -->
                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="#">ADD</a>
            </section>

            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">
                    <!-- <button class="like-btn"><img src="" alt="Like"></button> -->
                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="#">ADD</a>
            </section>
        </div>


        <?php 
            include "./parts/footer.php"
        ?>
    
</body>
</html>
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
                <div class="carousel-item"><img src="./imgs/salad01.jpg" alt="Image 1"></div>
                <div class="carousel-item"><img src="./imgs/salad02.jpg" alt="Image 2"></div>
                <div class="carousel-item"><img src="./imgs/salad03.jpg" alt="Image 3"></div>
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
            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">
                    <!-- <button class="like-btn"><img src="" alt="Like"></button> -->
                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="./description.html">ADD</a>
            </section>

            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">
                    <!-- <button class="like-btn"><img src="" alt="Like"></button> -->
                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="./description.html">ADD</a>
            </section>

            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">
                    <!-- <button class="like-btn"><img src="" alt="Like"></button> -->
                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="./description.html">ADD</a>
            </section>

            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">
                    <!-- <button class="like-btn"><img src="" alt="Like"></button> -->
                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="./description.html">ADD</a>
            </section>

            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">
                    <!-- <button class="like-btn"><img src="" alt="Like"></button> -->
                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="./description.html">ADD</a>
            </section>

            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">
                    <!-- <button class="like-btn"><img src="" alt="Like"></button> -->
                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="./description.html">ADD</a>
            </section>

            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">
                    <!-- <button class="like-btn"><img src="" alt="Like"></button> -->
                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="./description.html">ADD</a>
            </section>

            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">
                    <!-- <button class="like-btn"><img src="" alt="Like"></button> -->
                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="./description.html">ADD</a>
            </section>

            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">
                    <!-- <button class="like-btn"><img src="" alt="Like"></button> -->
                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="./description.html">ADD</a>
            </section>

            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">
                    <!-- <button class="like-btn"><img src="" alt="Like"></button> -->
                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="./description.html">ADD</a>
            </section>
        </div>
        <!-- recipe -->

        <h2 class="second-title">Categories</h2>

        <div class="categories-container">
            <a class="link-categories" href="./categories-entrees.html">
                <section class="categories">
                    <div class="categories-thumb">
                        <img class="categories-image" src="./imgs/Entrees-img.jpg" alt="">
                    </div>
                    <h3 class="categories-title">Entrees</h3>
                </section>
            </a>

            <a class="link-categories" href="./categories-main.html">
                <section class="categories">
                    <div class="categories-thumb">
                        <img class="categories-image" src="./imgs/Main Dishes-img.jpg" alt="">
                    </div>
                    <h3 class="categories-title">Main Dishes</h3>
                </section>
            </a>

            <a class="link-categories" href="./categories-desserts.html">
                <section class="categories">
                    <div class="categories-thumb">
                        <img class="categories-image" src="./imgs/Desserts-img.jpg" alt="">
                    </div>
                    <h3 class="categories-title">Desserts</h3>
                </section>
            </a>

            <a class="link-categories" href="./categories-drinks.html">
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
                    <input class="submit-btn" type="submit" value="">
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
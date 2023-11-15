<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drinks</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php 
        include "./parts/header.php"
    ?>
    <div class="head">
        <h1 class="title-categories">Drinks</h1>
    </div>

    <div>
        <a class="flecha-derecha" href="./categories-entrees.html"><img src="./imgs/right-arrow.png" alt=""></a>
        <a class="flecha-izquierda" href="./categories-desserts.html"><img src="./imgs/left-arrow.png" alt=""></a>
    </div>

    <main>
        <div class="recipe-container">
            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">

                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="#">ADD</a>
            </section>

            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">

                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="#">ADD</a>
            </section>

            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">

                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="#">ADD</a>
            </section>

            <section class="recipe">
                <div class="recipe-thumb">
                    <img class="recipe-image" src="./imgs/prueba.jpg" alt="">

                </div>
                <h3 class="recipe-title">Nombre</h3>
                <p class="recipe-price">Price</p>
                <a class="btn-add" href="#">ADD</a>
            </section>
        </div>


    </main>

    <?php 
        include "./parts/footer.php"
    ?>

</body>
</html>
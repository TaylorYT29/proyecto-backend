<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <?php 
        include "./parts/header.php"
    ?>
    <h2 class="second-title">Categories</h2>

    <main>
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


        <h2 class="second-title">quantities</h2>

        <div class="quantities-container">
            <a class="link-categories" href="./quanties-one.html">
                <section class="quantities">
                    <div class="quantities-thumb">
                        <img class="quantities-image" src="./imgs/one-person.png" alt="">
                    </div>
                    <h3 class="quantities-title">One person</h3>
                </section>
            </a>

            <a class="link-categories" href="./quantities-two.html">
                <section class="quantities">
                    <div class="quantities-thumb">
                        <img class="quantities-image" src="./imgs/2-people.png" alt="">
                    </div>
                    <h3 class="quantities-title">Two people</h3>
                </section>
            </a>

            <a class="link-categories" href="./quantities-family.html">
                <section class="quantities">
                    <div class="quantities-thumb">
                        <img class="quantities-image" src="./imgs/family.png" alt="">
                    </div>
                    <h3 class="quantities-title">Family</h3>
                </section>
            </a>
        </div>

    </main>

    <?php 
        include "./parts/footer.php"
    ?>

</body>

</html>
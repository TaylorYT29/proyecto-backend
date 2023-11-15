<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Description</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php 
        include "./parts/header.php"
    ?>
    <main>
        <div class="description-container">
            <div class="description-recipe">
                <p>Description:</p>
                <br>
                <p>quantities:</p>
                <br>
                <p>category:</p>
                <br>
                <p>price:</p>
            </div>

            <div class="recipe">
                <section class="recipe">
                    <div class="recipe-thumb">
                        <img class="recipe-image" src="./imgs/prueba.jpg" alt="">
                    </div>
                    <a class="btn-add" href="#">BUY</a>
                </section>

            </div>
        </div>
    </main>

    <?php 
        include "./parts/footer.php"
    ?>
    
</body>
</html>
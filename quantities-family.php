<?php
    require_once './database.php';
    // Reference: https://medoo.in/api/select
    $items = $database->select("tb_dish_information","*",["id_people_quantity"=>"3"]);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quantities-family</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php 
        include "./parts/header.php"
    ?>
<div class="head">
    <h1 class="title-categories">quantities-family</h1>
</div>

<div>
    <a class="flecha-derecha" href="./quanties-one.php"><img src="./imgs/right-arrow.png" alt=""></a>
    <a class="flecha-izquierda" href="./quantities-two.php"><img src="./imgs/left-arrow.png" alt=""></a>
</div>

<main>
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


</main>

<?php 
    include "./parts/footer.php"
?>

    
</body>
</html>
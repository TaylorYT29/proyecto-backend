<?php

/*
This file retrieves and displays dish information based on the specified parameters
passed through the query string ($_GET). It queries the "tb_dish_information" table in the
database to fetch dishes matching the given "people_quantity" and "dish_category" criteria.

The retrieved dish information is then displayed on the webpage, showing dish images, names,
prices, and brief descriptions. If no matching dishes are found, it displays a "No Results" message.
*/

    require_once './database.php';

    if(isset($_GET)) {
        $items = $database->select("tb_dish_information","*",[
            "AND" => [
                "id_peolple_quantity" => $_GET["people_quantity"],
                "id_dish_categories" => $_GET["dish_category"],
            ]
        ]);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camping Website</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@900&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <!-- google fonts -->
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php 
        include "./parts/header.php";
    ?>
    <main>
        <?php 
            include "./parts/activities.php";
        ?>


        <section class="dish-container">
            <img src="./imgs/icons/dish.svg" alt="">
            <h2 class="dish-title"></h2>
            <?php 
            if(count($items) > 0) {
                echo "<p> class= 'activity-text'> We found: ".count($items)." dish(es)</p>";
            }
            ?>
            <div class="activities-container">
                <?php
                    if(count($items) > 0) {
                        //var_dump($items);
                        foreach($items as $item){
                            echo "<section class='activity'>";
                            echo "<div class='activity-thumb'>";
                                echo "<img class='activity-image' src='./imgs/".$item["image"]."' alt='".$item["name"]."'>";
                                echo "<button class='like-btn'><img src='./imgs/icons/like.svg' alt='Like'></button>";
                                echo "<span class='activity-price'>$".$item["price"]."/night</span>";
                            echo "</div>";
                            echo "<h3 class='activity-title'>".$item["name"]."</h3>";
                            echo "<p class='activity-text'>".substr($item["dish_information_description"], 0, 70)."...</p>";
                            echo "<a class='btn read-btn' href='dish.php?id=".$item["id_dish_information"]."'>View Details</a>";
                        echo "</section>";
                        }
                    } else {
                        echo "<h3 class='activity-title'>No Results</h3>";
                    }
                ?>
                
            </div>

        </section>
        <?php 
            include "./parts/subscribe.php";
        ?>
    
    </main>
    <?php 
        include "./parts/footer.php";
    ?>

</body>
</html>


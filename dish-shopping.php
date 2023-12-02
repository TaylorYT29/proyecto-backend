<?php
    require_once './database.php';

    $amount = 1;
    $service = "";
    $pos_array = -1;

    if($_GET){
       
        // Reference: https://medoo.in/api/select
        // Note: don't delete the [>] 
        $item = $database->select("tb_dish_information",[
            "[>]tb_dish_categories"=>["id_dish_categories" => "id_dish_categories"]
        ],[
            "tb_dish_information.id_dish_information",
            "tb_dish_information.name",
            "tb_dish_information.dish_information_description",
            "tb_dish_information.image",
            "tb_dish_information.price",
            "tb_dish_categories.name_category",
            "tb_dish_categories.description",
        ],[
            "id_dish_information"=>$_GET["id"]
        ]);


        $dish_details = [];
        if(isset($_GET["index"])){
            $data = json_decode($_COOKIE['dish'], true);
            $booking_details = $data[$_GET["index"]];
            var_dump($dish_details);

            $amount = $dish_details["amount"];
            $service= $dish_details["service"];
            $pos_array = $_GET["index"];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dish Spopping</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php 
        include "./parts/header.php"
    ?>

    <div class="recipe">
                <?php 
                    echo "<section class='recipe'>";
                    echo "<div class='recipe-thumb'>";
                        echo "<img class='recipe-image' src='./imgs/".$item[0]["image"]."' alt='".$item[0]["name"]."'>";
                        echo "<h3  class=''><span id='dish-name'>".$item[0]["name"]."</h3>";
                        echo "<span class=''>$".$item[0]["price"]."</span>";
                    echo "</div>";
   
                ?>
                

            </div>


   
    
</body>
</html>
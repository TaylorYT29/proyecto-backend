<?php
    require_once './database.php';

    $amount = 1;
    $service = "";
    $pos_array = -1;
    $day ="";

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
            $day = $dish_details["day"];
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

<main>
        <div class="description-container">
            <div class="description-recipe">

            <?php 
                echo "<img class='recipe-image' src='./imgs/" . $item[0]["image"] . "' alt='" . $item[0]["name"] . "'>";
                echo "<h3  class=''><span id='dish-name'>" . $item[0]["name"] . "</h3>";
                echo "<p id='dish-description' class=''>" . $item[0]["dish_information_description"] . "</p>";
                echo "<br>";
                echo "<p class=''>" . $item[0]["name_category"] . "</p>";
                echo "<br>";
                echo "<span class=''>$" . $item[0]["price"] . "</span>";
                
            ?>
                
            </div>

        
            <div class="">
                <?php 
                  echo "<form class='form-container' action='confirmation.php' method='post'>"
                  
                  ."<div class='form-items'>"
                      ."<div>"
                          ."<label class='form-label' for='day'>Day</label>"
                      ."</div>"
                      ."<div>"
                          ."<input id='day' class='form-input' class='form-input' type='date' name='day' min='' max='2024-06-30' data-check='".$day."'>"
                      ."</div>"
                  ."</div>"

                  ."<div class='form-items'>"
                      ."<div>"
                          ."<label class='form-label' for='amount'>amount</label>"
                      ."</div>"
                      ."<div>"
                          ."<input id='amount' class='form-input' type='number' name='amount' min='1' max='' value='".$amount."'>"
                      ."</div>"
                  ."</div>"

                  ."<div class='form-items'>"
                      ."<div>"
                          ."<label class='form-label' for='service'>service</label>"
                      ."</div>"
                      ."<div>"
                          ."<input id='service' class='form-input' type='text' name='service'value='".$service."'>"
                      ."</div>"
                  ."</div>"

                ?>
            
            </div>
        </div>
    </main>
    
</body>
</html>
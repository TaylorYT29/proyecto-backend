<?php
    require_once './database.php';

    $link = "";
    $url_params = "";
    $lang= "";

    if($_GET){
        

        if(isset($_GET["lang"])&& $_GET["lang"]=="deu"){

        $item = $database->select("tb_dish_information",[
            "[>]tb_dish_categories"=>["id_dish_categories" => "id_dish_categories"]
             ],[
            "tb_dish_information.id_dish_information",
            "tb_dish_information.name_deu",
            "tb_dish_information.dish_information_description_deu",
            "tb_dish_information.image",
            "tb_dish_information.price",
            "tb_dish_categories.name_category",
            "tb_dish_categories.description",
             ],[
            "id_dish_information"=>$_GET["id"]
             ]);

             $item[0]["name"]=$item[0]["name_deu"];
             $item[0]["dish_information_description"]=$item[0]["dish_information_description_deu"];

            $url_params= "id=".$item[0]["id_dish_information"];
            $lang ="EN";

        }else{

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

                 $url_params= "id=".$item[0]["id_dish_information"]."&lang=deu";
                 $lang ="DEU";
        }
    }
?>

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

            <?php 
                echo "<p id='dish-description' class=''>".$item[0]["dish_information_description"]."</p>";

                echo "<br>";

                echo "<p class=''>".$item[0]["name_category"].": ".$item[0]["description"]."</p>";

                echo "<br>";

                echo "<span class=''>$".$item[0]["price"]."</span>";
            ?>
                
            </div>

            <div class="recipe">
                <?php 
                    echo "<section class='recipe'>";
                    echo "<div class='recipe-thumb'>";
                        echo "<img class='recipe-image' src='./imgs/".$item[0]["image"]."' alt='".$item[0]["name"]."'>";
                        echo "<h3  class=''><span id='dish-name'>".$item[0]["name"]."</h3>";
                    echo "</div>";

                    echo "<a class='btn-add' href='#'>BUY</a>";
                ?>
                

            </div>
        </div>
    </main>
   

    <?php 
        include "./parts/footer.php"
    ?>
    
</body>
</html>
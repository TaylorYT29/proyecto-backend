<?php
    require_once '../database.php';

    $link = "";
    $url_params = "";
    $lang = "";

    if($_GET){
        // Reference: https://medoo.in/api/where
        /*$item = $database->select("tb_destinations","*",[
            "id_destination"=>$_GET["id"]
        ]);*/

        // Reference: https://medoo.in/api/select
        // Note: don't delete the [>] 
        if(isset($_GET["lang"]) && $_GET["lang"] == "tr") {
        $item = $database->select("tb_dish_information",[
            "[>]tb_people_quantity"=>["id_peolple_quantity" => "id_peolple_quantity"],
            "[>]tb_dish_categories"=>["id_dish_categories" => "id_dish_categories"]
        ],[
            "tb_dish_information.id_dish_information",
            "tb_dish_information.name",
            "tb_dish_information.name_deu",
            "tb_dish_information.image",
            "tb_dish_information.isFeatured",
            "tb_dish_information.dish_information_description",
            "tb_dish_information.dish_information_description_deu",
            "tb_dish_information.people_quantity",
            "tb_dish_information.price",
            "tb_people_quantity.name",
            "tb_people_quantity.description",
            "tb_dish_categories.name_category",
            "tb_dish_categories.description",
        ],[
            "id_dish_information"=>$_GET["id"]
        ]);
        $item[0]["name"] = $item[0]["name_deu"];
        $item[0]["dish_information_description"] = $item[0]["dish_information_description_deu"];

        $url_params = "id=".$item[0]["id_dish_information"];
        $lang = "EN";
        } else {
            $item = $database->select("tb_dish_information",[
                "[>]tb_people_quantity"=>["id_peolple_quantity" => "id_peolple_quantity"],
                "[>]tb_dish_categories"=>["id_dish_categories" => "id_dish_categories"]
            ],[
                "tb_dish_information.id_dish_information",
                "tb_dish_information.name",
                "tb_dish_information.name_deu",
                "tb_dish_information.image",
                "tb_dish_information.isFeatured",
                "tb_dish_information.dish_information_description",
                "tb_dish_information.dish_information_description_deu",
                "tb_dish_information.people_quantity",
                "tb_dish_information.price",
                "tb_people_quantity.name",
                "tb_people_quantity.description",
                "tb_dish_categories.name_category",
                "tb_dish_categories.description",
            ],[
                "id_dish_information"=>$_GET["id"]
            ]);
            $url_params = "id=".$item[0]["id_dish_information"]."&lang=deu";
            $lang = "DEU";
        }
    }
        // Reference: https://medoo.in/api/select
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

        <!-- destinations -->
        <section class="destinations-container">
            <img src="./imgs/icons/destinations.svg" alt="Explore Destinations & Activities">
            <h2 class="destinations-title">Explore Destinations & Activities</h2>
            <div class="activities-container">
          
                <?php
                    echo "<section class='activity'>";
                        echo "<div class='activity-thumb'>";
                            echo "<img class='activity-image' src='./imgs/".$item[0]["destination_image"]."' alt='".$item[0]["destination_lname"]."'>";
                            echo "<button class='like-btn'><img src='./imgs/icons/like.svg' alt='Like'></button>";
                            echo "<span class='activity-price'>$".$item[0]["destination_price"]."/night</span>";
                        echo "</div>";
                        echo "<a class='lang-btn' href='./destination.php?".$url_params."'>". $lang."</a>";
                        echo "<h3 class='activity-title'>".$item[0]["destination_lname"].", ".$item[0]["us_state_name"]."</h3>";
                        echo "<p class='activity-category'>".$item[0]["camping_category_name"].": ".$item[0]["camping_category_description"]."</p>";
                        echo "<p class='activity-text'>".$item[0]["destination_description"]."</p>";
                        echo "<p class='activity-text'>People come to ".$item[0]["destination_lname"]." for it's beauty and tranquillity but many more want to find out more. We're listing our tours with seats currently available below:</p>";
                        echo "<ul class='activity-tours'>";
                            foreach($tours as $tour){
                                echo "<li>".$tour["destination_activity_name"]."</li>";
                            }
                        echo "</ul>";
                        echo "<p class='activity-category'>Tours with seats available, reservations are the only way to ensure a spot on a tour.*</p>";
                        if(isset($_SESSION["isLoggedIn"])){
                            $link = "book.php?id=".$item[0]["id_destination"]."";
                        }else{
                            $link = "./forms.php";
                        }
                        
                        echo "<a class='btn read-btn' href='".$link."'>Book Online</a>";
                    echo "</section>";
                ?>
                
            </div>

        </section>
        <!-- destinations -->

        <!-- subscribe -->
        <div class="activities-container subscribe">
            <section class="in-touch">
                <h2 class="destinations-title margin-none subscribe-title">Let's Stay in Touch</h2>
                <p>Get travel planning ideas, helpful tips, and stories from our visitors delivered right to your inbox.</p>
                <form class="subscribe-form" action="">
                    <img src="./imgs/icons/email.svg" alt="email address">
                    <input class="email" type="text" placeholder="Email Address">
                    <input class="submit-btn" type="submit" value="">
                </form>
            </section>
            <div>
                <img class="subscribe-image" src="./imgs/camping-graphic.webp" alt="Let's Stay in Touch">
            </div>
        </div>
        <!-- subscribe -->

    </main>
    <?php 
        include "./parts/footer.php";
    ?>
</body>
</html>


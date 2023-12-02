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
        if(isset($_GET["lang"]) && $_GET["lang"] == "deu") {
        $item = $database->select("tb_dish_information",[
            "[>]tb_people_quantity"=>["id_peolple_quantity" => "id_peolple_quantity"],
            "[>]tb_dish_categories"=>["id_dish_category" => "id_dish_categories"]
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
        $lang = "DEU";
        } else {
            $item = $database->select("tb_dish_information",[
                "[>]tb_people_quantity"=>["id_peolple_quantity" => "id_peolple_quantity"],
                "[>]tb_people_categories"=>["id_peolple_quantity" => "id_peolple_quantity"]
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
        //$tours = $database->select("tb_destination_activities","*");
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
                            echo "<img class='activity-image' src='./imgs/".$item[0]["image"]."' alt='".$item[0]["name"]."'>";
                            echo "<button class='like-btn'><img src='./imgs/icons/like.svg' alt='Like'></button>";
                            echo "<span class='activity-price'>$".$item[0]["price"]."/night</span>";
                        echo "</div>";
                        echo "<span id= 'lang' class='lang-btn' onclick='getTranslation(".$item[0]["id_dish_information"].")'>TR</span>";
                        echo "<h3 class='activity-title'><span id='destination-name'>" . $item[0]["name"] . "</span>, " . $item[0]["name"] . "</h3>";
                echo "<p class='activity-category'>" . $item[0]["name_category"] . ": " . $item[0]["description"] . "</p>";
                echo "<p id='destination-description' class='activity-text'>" . $item[0]["dish_information_description"] . "</p>";
                echo "<p class='activity-text'>People come to " . $item[0]["name"] . " for it's beauty and tranquillity but many more want to find out more. We're listing our tours with seats currently available below:</p>";
                echo "<ul class='activity-tours'>";
                foreach ($tours as $tour) {
                    echo "<li>" . $tour["name"] . "</li>";
                }
                echo "</ul>";
                echo "<p class='activity-category'>Tours with seats available, reservations are the only way to ensure a spot on a tour.*</p>";
                if (isset($_SESSION["isLoggedIn"])) {
                    $link = "book.php?id=" . $item[0]["id_dish_information"] . "";
                } else {
                    $link = "./forms.php";
                }

                echo "<a class='btn read-btn' href='" . $link . "'>Book Online</a>";
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

<script>

let requestLang = "deu";

function switchLang(){
    if(requestLang == "en") requestLang = "deu";
    else requestLang = "en";
    document.getElementById("lang").innerText = requestLang;
}

function getTranslation(id){
    console.log(id);
    

    let info = {
        id_destination: id,
        language: requestLang
    };

    //fetch
    fetch("http://localhost/traducir2/proyecto-backend/language.php",{
        method: "POST",
        mode: "same-origin",
        credentials: "same-origin",
        headers:{
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(info)
    })
    .then(response => response.json())
    .then(data => {

        switchLang();
        document.getElementById("destination-name").innerText = data.name;
        document.getElementById("destination-description").innerText = data.description;
    })
    .catch(err => console.log("error: " + err));
}
</script>
</body>
</html>


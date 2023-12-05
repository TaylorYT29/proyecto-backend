<?php

/*
This file initializes and retrieves necessary data from the database, including dish information,
people quantity options, and dish category options. It then displays a webpage allowing users to filter
dishes based on search criteria such as people quantity and dish category.
 
The "SEARCH DISH" button triggers a JavaScript function (getFilters) that makes a fetch request to the server. 
The server responds with filtered dish information, and the webpage dynamically updates to display the matching 
dishes or a "No Results" message.
*/

    require_once './database.php';
    // Reference: https://medoo.in/api/select
    $items = $database->select("tb_dish_information","*");

    // Reference: https://medoo.in/api/select
    $quantities = $database->select("tb_people_quantity","*");

    // Reference: https://medoo.in/api/select
    $categories = $database->select("tb_dish_categories","*");
    
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
    <section class="container-search-filters">
    <?php 
        include "./parts/header.php";
    ?>
    <main>

        <!-- dishes-->
        <section id="dishes" class="filter-title">
            <h2 class="dish-title">Enjoy our recipes</h2>
            <div class="activities-filter-container">
          
                <form>
                    <label for="search" class="dish-title">Search</label>
                    <input id="search" class="search" type="text" name="keyword">
                    
                    <select name="people_quantity" id="people_quantity" class="filter">
                    <?php 
                        foreach($quantities as $quantity){
                            echo "<option value='".$quantity["id_people_quantity"]."'>".$quantity["name_quantity"]."</option>";
                        }
                    ?>
                    </select>

                    <select name="dish_category" id="dish_category" class="filter">
                    <?php 
                        foreach($categories as $category){
                            echo "<option value='".$category["id_dish_categories"]."'>".$category["name_category"]."</option>";
                        }
                    ?>
                    </select>
                    <input id="search" type="button" class="btn search-btn" value="SEARCH DISH" onclick="getFilters()">
                </form>            
            </div>
            <p id='found' class='dish-title'></p>
        </section>

    </main>
    <?php 
        include "./parts/footer.php";
    ?>
    <script>

        function getFilters(){

            let info = {
                quantity: document.getElementById("people_quantity").value,
                category: document.getElementById("dish_category").value
            };

            //fetch
            fetch("http://localhost/z/proyecto-backend/response.php", {
                method: "POST",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    'Accept': 'application/json, text/plain, */*',
                    'Content-Type': "application/json"
                },
                body: JSON.stringify(info)
            })
            .then(response => response.json())
            .then(data => {
                //console.log(data);

                let found = document.getElementById("found");
                found.innerText = "We found: " + data.length + " dish(es)";

                if(document.getElementById("items") !== null) document.getElementById("items").remove();

                if(data.length > 0){
                    
                    //let container = document.getElementById("items");
                    let container = document.createElement("div");
                    container.setAttribute("id", "items");
                    container.classList.add("activities-filter-container");
                    document.getElementById("dishes").appendChild(container);
                    
                    data.forEach(function(item) {

                        let dish = document.createElement("section");
                        dish.classList.add("dish");
                        container.appendChild(dish);
                        //thumb
                        let thumb = document.createElement("div");
                        thumb.classList.add("dish-thumb");
                        dish.appendChild(thumb);
                        //create image
                        let image = document.createElement("img");
                        image.classList.add("dish-image");
                        image.setAttribute("src", './imgs/'+item.image);
                        image.setAttribute("alt", item.name);
                        thumb.appendChild(image);
                        //price
                        let price = document.createElement("span");
                        price.classList.add("recipe-search-filters-title");
                        price.classList.add("dish-price");
                        price.innerText = "$"+item.price;
                        thumb.appendChild(price);
                        //title
                        let title = document.createElement("h3");
                        title.classList.add("recipe-search-filters-title");
                        title.innerText = item.name;
                        dish.appendChild(title);
                        //description

                        //link
                        let link = document.createElement("a");
                        link.classList.add("btn-add");
                        link.classList.add("btn-add");
                        link.setAttribute("href", "description.php?id="+item.id_dish_information);
                        link.innerText = "View Details";
                        dish.appendChild(link);
                    });
                }
                
            })
            .catch(err => console.log("error: " + err));
            
        }
    </script>

</body>
</html>
<?php

/*
This file serves as an API endpoint to fetch dish information based on the provided JSON payload.
It expects a JSON payload with "quantity" and "category" properties, which are used to filter dishes
from the database table "tb_dish_information" based on "id_people_quantity" and "id_dish_categories".
*/

    require_once './database.php';
    
    if(isset($_SERVER["CONTENT_TYPE"])){
        $contentType = $_SERVER["CONTENT_TYPE"];

        if($contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));

            $decoded = json_decode($content, true);

            $items = $database->select("tb_dish_information","*",[
                "AND"=>[
                    "id_people_quantity" => $decoded["quantity"],
                    "id_dish_categories" => $decoded["category"]
                ]
            ]);
    
            echo json_encode($items);
        }
    }
?>
<?php
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
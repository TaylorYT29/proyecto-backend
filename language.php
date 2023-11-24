<?php 
    require_once'./database.php';

    $recipes= [];

    if(isset($_SERVER["CONTENT_TYPE"])){
        $contentType =$_SERVER["CONTENT_TYPE"];

        if($contentType=="application/json"){
            $content = trim(file_get_contents("php://input"));

            $descoded =json_decode($content,true);

            $response ="server response";
            

            if($descoded["language"]=='en'){
            $item = $database->select("tb_dish_information",[
                "tb_dish_information.name",
                "tb_dish_information.dish_information_description"
                 ],[
                "id_dish_information"=>$descoded["id_dish_information"]
                 ]);

                 $recipes["name"]= $item[0]["name"];
                 $recipes["description"]= $item[0]["dish_information_description"];
            }else{

                $item = $database->select("tb_dish_information",[
                    "tb_dish_information.name_deu",
                    "tb_dish_information.dish_information_description_deu"
                     ],[
                    "id_dish_information"=>$descoded["id_dish_information"]
                     ]);

                 $recipes["name"]= $item[0]["name_deu"];
                 $recipes["description"]= $item[0]["dish_information_description_deu"];

            }


            echo json_encode($recipes);

           
        }

    }
?>
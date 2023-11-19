<?php 
 
     require_once '../database.php';

     // Reference: https://medoo.in/api/select 
    $categories = $database->select("tb_dish_categories", "*");

    $message = "";
    
    if($_POST){

        // var_dump($_FILES);
        
        if(isset($_FILES["image"])){
           
            $errors= [];
            $file_name= $_FILES["image"]["name"];
            $file_size= $_FILES["image"]["size"];
            $file_tmp= $_FILES["image"]["tmp_name"];
            $file_type= $_FILES["image"]["type"];
            $file_ext_arr= explode(".", $_FILES["image"]["name"]);

            $file_ext = end($file_ext_arr);
            $img_ext = ["jpeg", "png", "jpg", "webp"];

            if(!in_array($file_ext, $img_ext)){
                $errors[]= "File type is not supported";
                $message = "File type is not supported";

            }
            
            if(empty($errors)){
                //location-big-bend-national-park-texas.jpg
                $filename = strtolower($_POST["name"]);
                $filename = str_replace(',', '', $filename);
                $filename = str_replace('.', '', $filename);
                $filename = str_replace(' ', '-', $filename);
                $img= "recipe-".$filename.".".$file_ext;
                move_uploaded_file($file_tmp, "../imgs/".$img);


            // Reference: https://medoo.in/api/insert
              $database->insert("tb_dish_information",[
                "id_dish_categories"=>$_POST["dish_category"],
                "name"=>$_POST["name"],
                // "name_deu"=>$_POST["name_deu"],
                "image"=>$img,
                "isFeatured"=> "isFeatured",
                "dish_information_description"=>$_POST["dish_information_description"],
                // "description_deu"=>$_POST["description_deu"],
                "people_quantity"=>"people_quantity",
                "price"=>$_POST["price"]

             ]);
            }

        }

       

    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dish</title>
    <link rel="stylesheet" href="../css/themes/admin.css"> 
    
</head>
<body>
    <div class="container">
        <h2>Add New Dish</h2>
   <?php 
            echo $message;
    ?>

    
      
        <form method="post" action="add-recipe.php" enctype="multipart/form-data">
            <div class="form-items">
                <label for="name">Dish Name</label>
                <input id="name" class="textfield" name="name" type="text">
            </div>

            <!-- <div class="form-items">
                <label for="name_deu">turkish Destination Name</label>
                <input id="name_deu" class="textfield" name="name_deu" type="text">
            </div> -->


            <div class="form-items">
                <label for="dish_category">Dish Category</label>
                <select name="dish_category" id="dish_category">
                <?php 
                        foreach($categories as $categories){
                            echo"<option value='".$categories["id_dish_categories"]."' >".$categories["name_category"]."</option>";
                        }
                    ?>

                </select>
            </div>

            <div class="form-items">
                <label for="dish_information_description">Dish Description</label>
                <textarea id="dish_information_description" name="dish_information_description" id="" cols="30" rows="10"></textarea>
            </div>

            <!-- <div class="form-items">
                <label for="description_deu">Turkish Destination Description</label>
                <textarea id="description_deu" name="description_deu" id="" cols="30" rows="10"></textarea>
            </div> -->

            <div class="form-items">
                <label for="image">Dish Image</label>
                <img id="preview" src="../imgs/destination-placeholder.webp" alt="Preview">
                <input id="image" type="file" name="image" onchange="readURL(this)">
            </div>
            <div class="form-items">
                <label for="price">Dish Price</label>
                <input id="price" class="textfield" name="price" type="text">
            </div>
            <div class="form-items">
                <input class="submit-btn" type="submit" value="Add New Dish">
            </div>
        </form>
    </div>

    <script>
        function readURL(input) {
            if(input.files && input.files[0]){
                let reader = new FileReader();

                reader.onload = function(e) {
                    let preview = document.getElementById('preview').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        
    </script>
    
</body>
</html>
<?php 
 
     require_once '../database.php';

     // Reference: https://medoo.in/api/select 
    $categories = $database->select("tb_dish_categories", "*");
    $people_quantity= $database->select("tb_people_quantity","*");

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
                "name_deu"=>$_POST["name_deu"],
                "image"=>$img,
                "isFeatured"=> $_POST["isFeatured"],
                "dish_information_description"=>$_POST["dish_information_description"],
                "dish_information_description_deu"=>$_POST["dish_information_description_deu"],
                "id_people_quantity"=>$_POST["people_quantity"],
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
        <h2 class="title-admin">Add New Dish</h2>
   <?php 
            echo $message;
    ?>

    
      
        <form method="post" action="add-recipe.php" enctype="multipart/form-data">
            <div class="form-items">
                <label for="name">Dish Name</label>
                <input id="name" class="textfield" name="name" type="text" placeholder="Name">
            </div>

            <div class="form-items">
                <label for="name_deu">Germany Dish Name</label>
                <input id="name_deu" class="textfield" name="name_deu" type="text" placeholder="Name">
            </div>


            <div class="form-items">
                <label for="dish_category">Dish Category</label>
                <select name="dish_category" id="dish_category" class="option-category">
                <?php 
                        foreach($categories as $categories){
                            echo"<option class='textfield' value='".$categories["id_dish_categories"]."' >".$categories["name_category"]."</option>";
                        }
                    ?>

                </select>
            </div>


            <div class="form-items">
                <label for="people_quantity">People Quantity</label>
                <select name="people_quantity" id="people_quantity" class="option-category">
                <?php 
                        foreach($people_quantity as $people_quantity){
                            echo"<option class='textfield' value='".$people_quantity["id_people_quantity"]."' >".$people_quantity["name_quantity"]."</option>";
                        }
                    ?>

                </select>
            </div>


            <div class="form-items">
                <label for="isFeatured">isFeatured</label>
                <input id="isFeatured" class="textfield" name="isFeatured" type="number" min="0" max="1" placeholder="isFeatured">
            </div>


            <div class="form-items">
                <label for="dish_information_description">Dish Description</label>
                <textarea class="textfield" id="dish_information_description" name="dish_information_description" placeholder="Description" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="form-items">
                <label for="dish_information_description_deu">Germany Dish Description</label>
                <textarea class="textfield" id="dish_information_description_deu" name="dish_information_description_deu" placeholder="Description"  id="" cols="30" rows="10"></textarea>
            </div>

            <div class="form-items">
                <label for="image">Dish Image</label>
                <img id="preview" src="../imgs/add-image.png" alt="Preview">
                <input class="textfield" id="image" type="file" name="image" onchange="readURL(this)">
            </div>
            <div class="form-items">
                <label for="price">Dish Price</label>
                <input id="price" class="textfield" name="price" type="text" placeholder="Price $">
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
<?php 
   
    require_once '../database.php';
    // Reference: https://medoo.in/api/select
    $categories = $database->select("tb_dish_categories","*");
    $people_quantity= $database->select("tb_people_quantity","*");

    $message = "";

    if (isset($_GET)){
        $item = $database->select("tb_dish_information", [
            "[>]tb_dish_categories" => ["id_dish_categories" => "id_dish_categories"],
            "[>]tb_people_quantity" => ["id_people_quantity" => "id_people_quantity"]
        ], [

            "tb_dish_information.id_dish_information",
            "tb_dish_information.name",
            "tb_dish_information.name_deu",
            "tb_dish_information.image",
            "tb_dish_information.isFeatured",
            "tb_dish_information.dish_information_description",
            "tb_dish_information.dish_information_description_deu",
            "tb_people_quantity.id_people_quantity",
            "tb_people_quantity.name_quantity",
            "tb_people_quantity.description",
            "tb_dish_information.price",
            "tb_dish_categories.id_dish_categories",
            "tb_dish_categories.name_category",
            "tb_dish_categories.description",
        ], [
            "id_dish_information" => $_GET["id_dish_information"]
        ]);
 
    }

    if($_POST){
        $data = $database->select("tb_dish_information","*", ["id_dish_information"=>$_POST["id"]
    ]);
        if(isset($_FILES["image"])&& $_FILES["image"]["name"] !=""){
            var_dump($_FILES);
            $errors = [];
            $file_name = $_FILES["image"]["name"];
            $file_size = $_FILES["image"]["size"];
            $file_tmp = $_FILES["image"]["tmp_name"];
            $file_type = $_FILES["image"]["type"];
            $file_ext_arr = explode(".", $_FILES["image"]["name"]);

            $file_ext = end($file_ext_arr);
            $img_ext = ["jpeg", "png", "jpg", "webp"];

            if(!in_array($file_ext, $img_ext)){
                $errors[] = "File type not supported";
                $message = "File type not supported";
            }

            
             if(empty($errors)){
                 $filename = strtolower($_POST["name"]);
                 $filename = str_replace(',', '', $filename);
                 $filename = str_replace('.', '', $filename);
                 $filename = str_replace(' ', '-', $filename);
                 $img = "location-".$filename.".".$file_ext;
                 echo $img;
                 move_uploaded_file($file_tmp, "../imgs/".$img);
             }
        }else{
            $img = $data[0]["image"];
        }
        $database->update("tb_dish_information",[
            "id_dish_categories" => $_POST["dish_category"],
            "name"=>$_POST["name"],
            "name_deu"=>$_POST["name_deu"],
            "image"=>"$img",
            "isFeatured"=>$_POST["isFeatured"],
            "dish_information_description"=>$_POST["dish_information_description"],
            "dish_information_description_deu"=>$_POST["dish_information_description_deu"],
            "id_people_quantity"=>$_POST["people_quantity"],
            "price"=>$_POST["price"]
        ],[
            "id_dish_information"=>$_POST["id"]
        ]);
        header("location: recipe-list.php");
        // Reference: https://medoo.in/api/insert  
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dish</title>
    <link rel="stylesheet" href="../css/themes/admin.css"> 
    
</head>
<body>
    <div class="container">
        <h2 class="title-admin">Edit Dish</h2>
   <?php 
            echo $message;
    ?>

    
        <form method="post" action="edit-recipe.php" enctype="multipart/form-data">
            <div class="form-items">
                <label for="name">Dish Name</label>
                <input id="name" class="textfield" name="name" type="text" value="<?php echo $item[0]["name"]?>">
            </div>

            <div class="form-items">
                <label for="name_deu">Germany Dish Name</label>
                <input id="name_deu" class="textfield" name="name_deu" type="text" value= "<?php echo $item[0]["name_deu"]?>" >
            </div> 


            <div class="form-items">
                <label for="dish_category">Dish Category</label>
                <select name="dish_category" id="dish_category" class="option-category">
                <?php 
                        foreach($categories as $category){
                            if($item[0]["id_dish_categories"]==$category["id_dish_categories"]) {
                                echo"<option value='".$category["id_dish_categories"]."' selected>".$category["name_category"]."</option>";
                            } else {
                                echo "<option value='".$category["id_dish_categories"]."'>".$category["name_category"]."</option>";
                            }
                            
                        }
                    ?>

                </select>
            </div>

            <div class="form-items">
                <label for="people_quantity">People Quantity</label>
                <select name="people_quantity" id="people_quantity" class="option-category">
                <?php 
                        foreach($people_quantity as $quantity){
                            if($item[0]["id_people_quantity"]==$quantity["id_people_quantity"]) {
                                echo"<option value='".$quantity["id_people_quantity"]."' selected>".$quantity["name_quantity"]."</option>";
                            } else {
                                echo "<option value='".$quantity["id_people_quantity"]."'>".$quantity["name_quantity"]."</option>";
                            }
                        }
                    ?>

                </select>
            </div>

            <div class="form-items">
                <label for="isFeatured">isFeatured</label>
                <input id="isFeatured" class="textfield" name="isFeatured" type="number" min="0" max="1" value="<?php echo $item[0]["isFeatured"]?>">
            </div>



            <div class="form-items">
                <label for="dish_information_description">Description</label>
                <textarea id="dish_information_description" name="dish_information_description" class="textfield" id="" cols="30" rows="10"><?php echo $item[0]["dish_information_description"]?></textarea>
            </div>

            <div class="form-items">
                <label for="dish_information_description_deu">Germany Description</label>
                <textarea id="dish_information_description_deu" name="dish_information_description_deu" class="textfield" id="" cols="30" rows="10"><?php echo $item[0]["dish_information_description_deu"]?></textarea>
            </div>
            
            <div class="form-items">
                <label for="image">Dish Image</label>
                <img id="preview" src="../imgs/<?php echo $item[0]["image"];?>" alt="Preview">
                <input class="textfield" id="image" type="file" name="image" onchange="readURL(this)">
            </div>
            <div class="form-items">
                <label for="price">Dish Price</label>
                <input id="price" class="textfield" name="price" type="text" value="<?php echo $item[0]["price"]?>">
            </div>
            <input type="hidden" name="id" value = "<?php echo $item[0]["id_dish_information"] ?>">
            <div class="form-items">
                <input class="submit-btn" type="submit" value="Edit Dish">
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
<?php 
    require_once '../database.php';
 
    if ($_GET){

        $item = $database->select("tb_dish_information","*",[
            "id_dish_information"=>$_GET["id_dish_information"]
        ]);
    }

    if($_POST){

        $item=$database->delete("tb_dish_information",[
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
    <title>Delete Destination</title>
    <link rel="stylesheet" href="../css/themes/admin.css">
</head>
<body>
   <h2>Are you sure you want to delete the dish?</h2>

   <form action="delete-recipe.php" method="post">
    <input type="hidden" name="id" value = "<?php echo $item[0]["id_dish_information"] ?>">
    <input type="submit" value="Delete">
   </form>
   <br>
   <a href="recipe-list.php"> <input type="submit" value="Cancel" ></a>
  
</body>
</html>
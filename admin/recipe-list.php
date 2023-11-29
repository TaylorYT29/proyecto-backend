<?php 
    require_once '../database.php';
    // Reference: https://medoo.in/api/select
    $items = $database->select("tb_dish_information","*");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Dish-list</title>
</head>
<body>
    <h2 class="second-title">Dish-list</h2>
    <?php 
    echo "<table style='margin-top: 2rem;'>"
    ."<tr class='table-columns'><td>Name</td> <td>Description</td> <td>Category</td> <td>People_quantity</td> <td>Price</td> <td>
    action</td> </tr>";
        foreach($items as $item){
            echo "<tr>"
            ."<td class='table-row'>".$item["name"]."</td>"
            ."<td class='table-row'>".$item["dish_information_description"]."</td>"
            ."<td class='table-row'>".$item["id_dish_categories"]."</td>"
            ."<td class='table-row'>".$item["people_quantity"]."</td>"
            ."<td class='table-row'>".$item["price"]."</td>"
            ."<td class='table-row'><a class='link-admin' href='edit-recipe.php?id_dish_information=".$item["id_dish_information"]."'>Edit</a> <a class='link-admin' href='delete-recipe.php?id_dish_information=".$item["id_dish_information"]."'>Delete</a></td>"
        ."</tr>";

    }
    echo "</tr>"
     ."</table>";
      
    ?>

  
    
</body>
</html>
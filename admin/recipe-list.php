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
    <title>Destination-list</title>
</head>
<body>
    <h2>Destination-list</h2>
    <table>
        <?php
            foreach($items as $item){
                echo "<tr>";
                echo "<td>".$item["name"]."</td>";
                echo "<td><a href='edit-destination.php?id_dish_information=".$item["id_dish_information"]."'>Edit</a> <a href='delete-destination.php?id_dish_information=".$item["id_dish_information"]."'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
    
</body>
</html>
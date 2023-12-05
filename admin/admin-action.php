<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<h2 class="second-title">Hello administrator</h2>
<div class="container-admin">



<?php 

    echo "<table style='margin-top: 2rem;'>"
    ."<tr class='table-columns'><td class='table-title'>List-Recipe</td> <td class='table-title'>Add-recipe</td></tr>";

    echo "<tr>"
            ."<td class='table-row'><a href='recipe-list.php'><img class='img-admin' src='../imgs/list-recipe.png' alt=''></a></td>"
            ."<td class='table-row'><a href='add-recipe.php'><img class='img-admin' src='../imgs/add-recipe.png' alt=''></a></td>"
        ."</tr>";


?>
</div>








</body>
</html>
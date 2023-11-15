<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
    <?php 
        include "./parts/header.php"
    ?>
<body>
    <header class="carrito-header">
        <h1>Jägermeister's Tisch</h1>
    </header>
    <div class="container">
        <h2 class="cart-title">Shopping Cart</h2>
        <div class="cart-item">
            <img src="./imgs/tranding-food-1.png" alt="Producto 1">
            <div class="cart-item-info">
                <h3 class="product-name">Product Name 1</h3>
                <p class="product-price">Price: €10.00</p>
                <p class="product-quantity">Quantity: 1</p>
                <button class="remove-button">Delete</button>
            </div>
        </div>
        <div class="cart-item">
            <img src="./imgs/tranding-food-2.png" alt="Producto 2">
            <div class="cart-item-info">
                <h3 class="product-name">Product Name 2</h3>
                <p class="product-price">Price: €15.00</p>
                <p class="product-quantity">Quantity: 2</p>
                <button class="remove-button">Delete</button>
            </div>
        </div>
        <!-- Agrega más productos en el carrito aquí -->

        <div class="cart-summary">
            <p class="total-price">Total: €40.00</p>
            <button class="checkout-button">Make payment</button>
        </div>
    </div>
</body>

<?php 
    include "./parts/footer.php"
?>
</html>

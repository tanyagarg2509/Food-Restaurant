<?php
session_start();
if(!isset($_SESSION['userid'])){
	header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- style-sheet -->
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
<h1>Shopping Cart</h1>
<div class="shopping-cart">


  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>

  <?php include 'mycart.php' ?>
 
  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal"><?php echo $totalPrice ?></div>
    </div>
    <div class="totals-item">
      <label>Tax (5%)</label>
      <div class="totals-value" id="cart-tax"><?php echo $totalPrice*00.5 ?></div>
    </div>
    <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping">15.00</div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total"><?php echo ($totalPrice*00.5) + $totalPrice?></div>
    </div>
  </div>
       
      <button class="checkout">Checkout</button>
 
</div>
    <!-- //script tag -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/cart.js"></script>
</body>
</html>
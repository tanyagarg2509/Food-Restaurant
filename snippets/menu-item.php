<?php
session_start();
?>
<div class="menu-item-tile col-md-6">
  <div class="row">
    <div class="col-sm-5">
      <div class="menu-item-photo">
        <div>{{short_name}}</div>
        <img class="img-responsive" width="250" height="150" src="images/menu/{{catShortName}}/{{short_name}}.jpg" alt="Item">
      </div>
      <div class="menu-item-price">{{price_small}}<span> {{small_portion_name}}</span> {{price_large}} <span>{{large_portion_name}}</span></div>
    </div>
    <div class="menu-item-description col-sm-7">
      <h3 class="menu-item-title">{{name}}</h3>
      <p class="menu-item-details">{{description}}</p>
      <?php
        if(isset($_SESSION['userid']) && $_SESSION['userid']!=""){
          echo '<button type="button" class="btn btn-warning" onclick="addtocart({{id}},\'{{catShortName}}\')">Add To Cart</button>';    
        }else{
          echo '<a href="login.php" class="btn btn-warning">Add To Cart</a>';
        }
      ?>
      
    </div>
  </div>
  <hr class="visible-xs">
</div>
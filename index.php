<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food Ordering</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
  </head>
<body>
  <header>
    <nav id="header-nav" class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="pull-left visible-md visible-lg">
            <div id="logo-img" alt="Logo image"></div>
          </a>

          <div class="navbar-brand">
            <a href="index.php"><h1>Food Ordering</h1></a>
          </div>

          <button id="navbarToggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div id="collapsable-nav" class="collapse navbar-collapse">
           <ul id="nav-list" class="nav navbar-nav navbar-right">
            <li id="navHomeButton" class="visible-xs active">
              <a href="index.php">
                <span class="glyphicon glyphicon-home"></span> Home</a>
            </li>
            <li id="navMenuButton">
              <a href="#" onclick="$dc.loadMenuCategories();">
                <span class="glyphicon glyphicon-cutlery"></span><br class="hidden-xs"> Menu</a>
            </li>
            <li>
              <?php
              if(isset($_SESSION['userid']) && $_SESSION['userid']!=""){
                echo '<a href="logout.php"><span class="glyphicon glyphicon-info-sign"></span><br class="hidden-xs"> Logout</a>';
              }else{
                echo '<a href="login.php"><span class="glyphicon glyphicon-info-sign"></span><br class="hidden-xs"> Login</a>';
              }
              ?>
            </li>
            <li>
            <?php
              if(isset($_SESSION['userid']) && $_SESSION['userid']!=""){
                echo '<a href="cart.php">
                <span class="glyphicon glyphicon-certificate"></span><br class="hidden-xs"> Go To Cart</a>';
              }else{
                echo '<a href="login.php"><span class="glyphicon glyphicon-certificate"></span><br class="hidden-xs"> Go To Cart</a>';
              }
              ?>
            </li>
            <li id="phone" class="hidden-xs">
              <a href="tel:410-602-5008">
                <span>410-602-5008</span></a><div>* We Deliver</div>
            </li>
          </ul><!-- #nav-list -->
        </div><!-- .collapse .navbar-collapse -->
      </div><!-- .container -->
    </nav><!-- #header-nav -->
  </header>

  <div id="call-btn" class="visible-xs">
    <a class="btn" href="tel:410-602-5008">
    <span class="glyphicon glyphicon-earphone"></span>
    410-602-5008
    </a>
  </div>
  <div id="xs-deliver" class="text-center visible-xs">* We Deliver</div>

  <div id="main-content" class="container"></div>

  <footer class="panel-footer">
    <div class="container">
      <div class="row">
        <section id="hours" class="col-sm-4">
          <span>Hours:</span><br>
          Sun-Thurs: 11:15am - 10:00pm<br>
          Fri: 11:15am - 2:30pm<br>
          Saturday Closed
          <hr class="visible-xs">
        </section>
        <section id="address" class="col-sm-4">
          <span>Address:</span><br>
          7105 Reisterstown Road<br>
          Baltimore, MD 21215
          <p>* Delivery area within 3-4 miles, with minimum order of Rs 30.</p>
          <hr class="visible-xs">
        </section>

        <section id="testimonials" class="col-sm-4">
          <p>"The best Chinese restaurant I've been to! And that's saying a lot, since I've been to many!"</p>
          <p>"Amazing food! Great service! Couldn't ask for more! I'll be back again and again!"</p>
        </section>
      </div>
      <div class="text-center">&copy; Copyright Food Ordering 2020</div>
    </div>
  </footer>

  <!-- jQuery (Bootstrap JS plugins depend on it) -->
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/ajax-utils.js"></script>
  <script src="js/script.js"></script>
  <script>
    console.log('hello');
    function addtocart(itemId,category){
      $.post("addtocart.php",
      {
        id: itemId,        
        category:category,
      },
      function(data, status){
        var result = JSON.parse(data);
        if(result.success){
          alert("Data: " + result.success + "\nStatus: " + status);
        }
        else{
          alert("Data: " + result.success + "\nStatus: " + status);
        }
      });
    }
  </script>
</body>
</html>
<style>
#snackbar {
  visibility: hidden;
  min-width: 250px;
  background-color: #fff;
  color: #61122f;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 10000;
  right: 30px;
  top: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {right: 0; opacity: 0;} 
  to {right: 30px; opacity: 1;}
}

@keyframes fadein {
  from {right: 0; opacity: 0;}
  to {right: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {right: 30px; opacity: 1;} 
  to {right: 0; opacity: 0;}
}

@keyframes fadeout {
  from {right: 30px; opacity: 1;}
  to {right: 0; opacity: 0;}
}
</style>

<div id="snackbar"></div>

<script>
<?php

    if(isset($_SESSION['toast'])){
        $msg=$_SESSION['toast'];
        echo "var toast='$msg';";
        unset($_SESSION['toast']);
    }
    else{
        echo "var toast='';";
    }
?>
function myToastFunction(t) {
  var x = document.getElementById("snackbar");
  x.className = "show";
  x.innerHTML=t;
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

if(toast!=''){
  myToastFunction(toast);
}
</script>


</body>
</html>
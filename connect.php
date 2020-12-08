<?php
$servername="localhost";
$dbusername="root";
$password="password";
$database="Restaurant";
$conn = mysqli_connect($servername,$dbusername,$password,$database);
if(!$conn){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}	

?>
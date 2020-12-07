<?php
include 'connect.php';
session_start();
if(isset($_POST['submit'])) {
    if($_POST['submit']=="Sign Up"){
        $password = $_POST['password'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        // $sql = "Select * from Users where email = $email" ;
        $sql = "INSERT INTO `Users` (`name`, `email`, `password`) VALUES ('$name','$email','$password')";
                $result=mysqli_query($conn, $sql);
               
				if(!$result)
				{
                   array_push($error,"Something Went Wrong try again after sometime");
                } else {
                   $sql1 = "Select * from Users where email = $email";
                   $result1=mysqli_query($conn, $sql1);
                   $row = $result1->fetch_assoc();
                    echo $row['name'];
                    $_SESSION['username'] = $row['name'];
                    $_SESSION['userid'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                }

    } elseif($_POST['submit']=="Sign In"){

    }else{
        header("location: index.html");
    }
}else{
    header("location: index.html");
}
?>
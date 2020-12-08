<?php
include 'connect.php';
session_start();
if(isset($_POST['submit'])) {
    if($_POST['submit']=="Sign Up"){
        $password = $_POST['password'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "Select * from Users where email = '$email'" ;
        $result=mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['toast'] = "User already Exists";
            header("location:login.php");
        }
        else{
            $sql = "INSERT INTO `Users` (`name`, `email`, `password`) VALUES ('$name','$email','$password')";
            $result=mysqli_query($conn, $sql);
                
            if(!$result){
                $_SESSION['toast'] = "Something Went Wrong try again after sometime";
                header("location:login.php");
            } else {
                $last_id = mysqli_insert_id($conn);
                $_SESSION['username'] = $name;
                $_SESSION['userid'] = $last_id;
                $_SESSION['email'] = $email;
                $_SESSION['toast'] = "Hello ".$name."!";
                header("location: index.php");
            }
        }
       

    } elseif($_POST['submit']=="Sign In"){
        $password = $_POST['password'];
        $email = $_POST['email'];
        $sql = "Select * from Users where email = '$email' and password = '$password'" ;
        $result=mysqli_query($conn, $sql);
               
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['name'];
            $_SESSION['userid'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['toast'] = "Hello ".$row['name']."!"; 
            header("location: index.php");
        } else {
            $_SESSION['toast'] = "Incorrect Email or Password.";
            header("location:login.php");
        }

    } else{
        header("location: index.php");
    }

} else{
    header("location: index.php");
}
?>
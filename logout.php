<?php
    session_start();
    session_destroy();
    session_start();
    $_SESSION['toast'] = "Successfully Logout.";
    header("location: index.php");
?>
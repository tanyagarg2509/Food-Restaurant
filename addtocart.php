<?php
session_start();
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST['id']) && $_POST['id']!='' && isset($_POST['category']) && $_POST['category']!=''){

        $id=$_POST['id'];
        $category=$_POST['category'];
        $user_id=$_SESSION['userid'];
        
        $sql = "SELECT * from Cart where user_id = '$user_id' and item_id ='$id' ";
        $result=mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $quantity=$row['quantity']+1;
            $id=$row['id'];
            $sql = "UPDATE Cart SET quantity = '$quantity' WHERE id = '$id'";
            $result=mysqli_query($conn, $sql);
            if(!$result){
                echo json_encode(['success'=>false,'msg'=>'Something went wrong']);
            } else {
                echo json_encode(['success'=>true,'msg'=>'Added to your cart']);
            }
        }else{
            $sql = "INSERT INTO `Cart` (`item_id`, `user_id`,`category`) VALUES ('$id','$user_id','$category')";
            $result=mysqli_query($conn, $sql);
            if(!$result){
                echo json_encode(['success'=>false,'msg'=>'Something went wrong']);
            } else {
                echo json_encode(['success'=>true,'msg'=>'Added to your cart']);
            }
        }
        
    }else{
        echo json_encode(['success'=>false , 'msg'=>"Invalid Item"]);    
    }
    
}else{
    echo json_encode(['success'=>false , 'msg'=>"Invalid Request"]);
}
?>
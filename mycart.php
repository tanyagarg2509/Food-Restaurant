<?php
    include 'connect.php';
    $user_id=$_SESSION['userid'];
    $sql = "Select * from Cart where user_id = '$user_id'" ;
    $result=mysqli_query($conn, $sql);
    $totalPrice=0;
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            $id=$row['item_id'];
            $category=$row['category'];
            $item=getItem($id, $category);
            $totalPrice+=$item['price_large']*$row['quantity'];
            echo '<div class="product">';
            echo '<div class="product-image">';
            echo "<img src='images\menu\\".$category."\\".$item['short_name'].".jpg'>";
            echo '</div>';
            echo '<div class="product-details">';
            echo '<div class="product-title">'.$item['name'];
            echo '</div>';
            echo '<p class="product-description">'.$item['description'].'</p>';
            echo '</div>';
            echo '<div class="product-price">'.$item['price_large'].'</div>';
            echo '<div class="product-quantity">';
            echo '<input type="number" value="'.$row['quantity'].'" min="1">';
            echo '</div>';
            echo '<div class="product-removal">';
            echo '<button class="remove-product">';
            echo 'Remove';
            echo '</button>';
            echo '</div>';
            echo '<div class="product-line-price">'.$item['price_large']*$row['quantity'].'</div>';
            echo '</div>';
        }
        
    } else {
        echo "rahul";
    }

    function getItem($id,$cat){
        $str = file_get_contents('https://davids-restaurant.herokuapp.com/menu_items.json?category='.$cat);
        $json = json_decode($str, true); 
        foreach ($json['menu_items'] as $key => $value) {
            if($value['id']==$id){
                return $value;
            }
        }
    }
?>
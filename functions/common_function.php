<?php
function getItems(){
    include('./includes/db.php');
    $stmt = $pdo->prepare("SELECT * FROM products ORDER BY product_title LIMIT 8");
    $stmt->execute();
    
    //echo $row['product_title']
    while($row=$stmt->fetch()){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_keyword=$row['product_keyword'];
          $category_id=$row['category_id'];
          $product_image=$row['product_image'];
          $product_price=$row['product_price'];

      echo "<div class='col-md-3'>
     <div class='card' style='width: 18rem;'>
            <img src='./images/$product_image' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                
            </div>
            </div>
     </div> ";
    }
}

function getAllItems(){
    include('./includes/db.php');
    $stmt = $pdo->prepare("SELECT * FROM products ORDER BY product_title");
    $stmt->execute();
    
    //echo $row['product_title']
    while($row=$stmt->fetch()){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_keyword=$row['product_keyword'];
          $category_id=$row['category_id'];
          $product_image=$row['product_image'];
          $product_price=$row['product_price'];

      echo "<div class='col-md-3'>
     <div class='card' style='width: 18rem;'>
            <img src='./images/$product_image' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                
            </div>
            </div>
     </div> ";
    }


}
function search_func(){
    include('./includes/db.php');
    if(isset($_GET['search_item_name'])){
        $search_res=$_GET['search_item'];
    
    $stmt = $pdo->prepare("SELECT * FROM products WHERE product_keyword LIKE ?");
    $stmt->execute([$search_res]);

    $rows=$stmt->rowCount();
    if($rows== 0){
        echo "<h2 class='text-center text-warning'> This item is not available</h2>";
    }
    
    //echo $row['product_title']
    while($row=$stmt->fetch()){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_keyword=$row['product_keyword'];
          $category_id=$row['category_id'];
          $product_image=$row['product_image'];
          $product_price=$row['product_price'];

      echo "<div class='col-md-3'>
     <div class='card' style='width: 18rem;'>
            <img src='./images/$product_image' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                
            </div>
            </div>
     </div> ";
    }
    }
}

function getIPAddress() {  
    include('./includes/db.php');
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 


function cart(){
    include('./includes/db.php');
if(isset($_GET['add_to_cart'])){
    $ip = getIPAddress();
    $get_prod_id = $_GET['add_to_cart'];
    $stmt = $pdo->prepare("SELECT * FROM cart_details WHERE ip_address = ? AND product_id = ?");
    $stmt->execute([$ip,$get_prod_id]);

    $rows=$stmt->rowCount();
    if($rows> 0){
        echo "<script>alert('This item is already present')</script>";
        echo "<script>window.open('index.php','_self')</script";
    }else{
        $in_query= $pdo->prepare("INSERT INTO cart_details (product_id,ip_address,quantity) VALUES (?,?,?)");
        $in_query->execute([$get_prod_id, $ip,0]);
        echo "<script>alert('Item added!')</script>";
        echo "<script>window.open('index.php','_self')</script";
    }

}

}

function cart_num(){
    include('./includes/db.php');
    if(isset($_GET['add_to_cart'])){
        $ip = getIPAddress();
        
        $stmt = $pdo->prepare("SELECT * FROM cart_details WHERE ip_address = ? ");
        $stmt->execute([$ip]);
    
        $row_count=$stmt->rowCount();
        
        }else{
            $ip = getIPAddress();
        
        $stmt = $pdo->prepare("SELECT * FROM cart_details WHERE ip_address = ? ");
        $stmt->execute([$ip]);
    
        $row_count=$stmt->rowCount();
        }
        echo $row_count;
    }



function total_price(){

include('./includes/db.php');
    $ip = getIPAddress();

    // Query to get all cart details along with product details for the given IP address
    $stmt = $pdo->prepare("
        SELECT cd.product_id, p.product_price 
        FROM cart_details cd 
        JOIN products p ON cd.product_id = p.product_id 
        WHERE cd.ip_address = ?
    ");
    $stmt->execute([$ip]);

    $total = 0;

    // Fetch each row and calculate the total price
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $total += $row['product_price'];
    }

    echo $total;
}
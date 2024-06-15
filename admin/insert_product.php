<?php
include('../includes/db.php');
if(isset($_POST['insert_product'])){
    $product_title=$_Post['product_title'];
    $description=$_Post['description'];
    $product_keyword=$_Post['product_keyword'];
    $product_category=$_Post['product_category'];
    $price=$_Post['price'];


    //image access

    $product_image=$_FILES['product_image']['name'];
    //tmp name
    $temp_image=$_Files['product_image']['tmp_name'];

    
                move_uploaded_file($temp_image,"./product_images/$product_image");

                //query
                $in_query="INSERT INTO products(product_title,product_description,product_keyword,category_id,product_image,product_price) VALUES (?,?,?,?,?,?)";
                $stmt = $pdo->prepare( $in_query );
                $stmt->execute([$product_title,$description,$product_keyword,$product_category,$product_image,$price]);

                if($stmt->execute([$product_title,$description,$product_keyword,$product_category,$product_image,$price])){
                    echo "<script>alert('Succesfully added')</script>";
                }

        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1> 
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter description" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter keyword" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select category</option>
                    <?php
                        $stmt = $pdo->prepare("SELECT * FROM categories");
                        $stmt->execute([]);
                        $row= $stmt->fetch(PDO::FETCH_ASSOC);
                        while($row= $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                    <!-- Learned to loop form database so its more dynamic
                    <option value="">jacket</option>
                    <option value="">shirts</option>
                    <option value="">pants</option>
                    <option value="">skirts</option>
                    <option value="">dress</option>
                    <option value="">accessories</option>-->
                </select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">Product image</label>
                <input type="file" name="product_image" id="product_image" class="form-control" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="price" class="form-label">Product price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3 "value="Insert Product" >
            </div>
        </form>
    </div>
    
</body>
</html>
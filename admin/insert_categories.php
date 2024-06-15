<?php
include('../includes/db.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $category_title=$_POST['cat_title'];

    $search_stmt=$pdo->prepare('SELECT * FROM categories WHERE category_title = ?');
    $search_stmt->execute([$category_title]);

    if( $search_stmt->execute([$category_title])>0){
        echo "<script>alert('Catagory already present')</script>";
    }
    else if( $search_stmt->execute([$category_title])< 0){
     $stmt = $pdo->prepare("INSERT INTO categories (category_title) VALUES (?)");
         $stmt->execute([$category_title]);
        if( $stmt->execute([$category_title])){
        echo "<script>alert('Catagory Inserted')</script>";
        }
    }

    
    
}
?>

<h2 class="text-center">Insert Category</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group w-102 mb-2 m-auto">

<input type="submit" class="bg-info border-0 px-3 my-3" name="insert_cat" value="Insert Categories" >
</div>

</form>
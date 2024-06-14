
<?php
include('./includes/db.php');
include('./functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    

<nav class="navbar navbar-expand-lg 
navbar-light " style="background:beige;display: flex;
    padding-top: 2rem;
    padding-bottom: 2rem;
    box-shadow: var(--box-shadow);
    align-items: center;
    justify-content: space-between;position: sticky;
    top:0;left: 0;right: 0;
    z-index: 1000;">
  <div class="container-fluid">
    <a class="navbar-brand" style="font-size: 2rem; margin-left: 2rem; color: var(--black);" href="index.php">CLC.</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active " style="font-size: 2rem;margin-left: 2rem;color: var(--black);"aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="font-size: 2rem; margin-left: 2rem; color: var(--black);"href="shop.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"style="font-size: 2rem; margin-left: 2rem; color: var(--black);" href="#">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="font-size: 2rem; margin-left: 2rem; color: var(--black);" href="#">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="font-size: 2rem; margin-left: 2rem; color: var(--black);"href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_num();?></sup></i></a>
        </li>
        
        
      </ul>
      
    </div>
  </div>
    </nav>
    <?php
    cart();
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">

    <ul class="navbar-nav me-auto ">
    <li class="nav-item">
          <a class="nav-link" href="#">Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>


    </ul>

    </nav>

<div class="container">
<div class="row ">
<table class="table table-bordered text-center" >
    <thead>
        <tr>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Remove</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>eg</td>
            <td><img src="./images/jacket.png" alt=""></td>
            <td><input type="text"name=""id="" ></td>
            <td>0000</td>
            <td><input type="checkbox"></td>
            <td>
                <p>Update</p>
                <p>remove</p>
            </td>
        </tr>

    </tbody>
</table>
<div class="d-flex">
<h4 class="px-3">Subtotal:<strong style="color:black;">5000</strong></h4>
<a href="index.php"><button style="color:blueviolet;"class="px-3 border-0">Keep shopping</button></a>
<a href="#"><button style="color:blueviolet;"class="px-3 border-0">Keep shopping</button></a>
</div>
</div>

</div>
    

   

   <?php
   include('footer.php');
   ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assests/jsScript.js"></script>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

    <link rel="stylesheet" href="style2.css">
</head>
<body>

<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light "style="background:beige;display: flex;
    padding-top: 2rem;
    padding-bottom: 2rem;
    box-shadow: var(--box-shadow);
    align-items: center;
    justify-content: space-between;position: sticky;
    top:0;left: 0;right: 0;
    z-index: 1000;">
        <div class="container-fluid">
            <img src="../images/logo.png" alt="">
            <nav class="navbar navbar-expand-lg ">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link">Welcome guest</a>
                </li>
            </ul>
            </nav>
        </div>
    </nav>

    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex ">
                <div class="p-5">
                    <a href=""><img src="..images/logo.png" alt="" class="admin image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                
                <div class="button text-center my-3">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-2">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-2">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-2">View Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-2">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-2">All orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-2">All payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-2">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-2">Logout</a></button>

                </div>
            </div>
    </div>

</div>



<div class="container my-5">
    <?php
        if(isset($_GET['insert_category']) ){
            include('insert_categories.php');
        }
    ?>
</div>






<?php
include('../footer.php');
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assests/jsScript.js"></script>
    </body>
</html>
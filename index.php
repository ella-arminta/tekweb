<?php
include 'api/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .content-box {
            width:70%; background-color:#e8907d; margin:auto; margin-top:100px; padding:25px; border-radius:5px
        }
        .resp-category-button-div {
            height:150px; width:50px; padding-top:55px;
        }
        .button-left {
            margin-right:20px; float:left
        }
        .button-right {
            margin-left:20px; float:right
        }
        .resp-category-button {
            display:block; margin:auto; width:40px; height:40px
        }
        .resp-category {
            height:150px; width:150px; background-color:white; padding-top:10px; border-radius:10px
        }
        .resp-category:hover {
            border:1px solid #8c52ff;
        }
        .resp-category-img {
            display:block; margin:auto; width:90px; height:90px
        }
        .resp-text {
            font-size:16px;
            padding-top:5px; text-align:center
        }
        .bold-text {
            font-weight:bold
        }
        .resp-product {
            width:180px; height:250px; background-color:white; padding:5px;
            border-radius:5px; border:2px solid white;
            margin-bottom:25px;
        }
        .resp-product:hover {
            border:2px solid #8c52ff;
        }
        .resp-product-img {
            display:block; margin:auto; width:165px; height:165px; margin-bottom:5px
        }
        @media only screen and (max-width: 1200px) {
            .resp-category-button-div {
                height:120px; width:50px; padding-top:40px;
            }
            .button-left {
                margin-right:15px; float:left
            }
            .button-right {
                margin-left:15px; float:right
            }
            .resp-category-button {
                display:block; margin:auto; width:40px; height:40px
            }
            .resp-category {
                height:120px; width:120px; background-color:white; padding-top:10px; border-radius:10px
            }
            .resp-category-img {
                display:block; margin:auto; width:70px; height:70px
            }
            .resp-text {
                font-size:14px;
                padding-top:5px; text-align:center
            }
            .resp-product {
                width:150px; height:210px; background-color:white; padding:5px;
                border-radius:5px; border:2px solid white;
                margin-bottom:25px;
            }
            .resp-product-img {
                display:block; margin:auto; width:135px; height:135px; margin-bottom:5px
            }
        }
        @media only screen and (max-width: 1000px) {
            .content-box {
                width:80%; background-color:#e8907d; margin:auto; margin-top:100px; padding:20px; border-radius:5px
            }
        }
        @media only screen and (max-width: 900px) {
            .content-box {
                width:80%; background-color:#e8907d; margin:auto; margin-top:100px; padding:20px; border-radius:5px
            }
            .resp-category-button-div {
                height:100px; width:40px; padding-top:35px;
            }
            .button-left {
                margin-right:10px; float:left
            }
            .button-right {
                margin-left:10px; float:right
            }
            .resp-category-button {
                display:block; margin:auto; width:30px; height:30px
            }
            .resp-category {
                height:100px; width:100px; background-color:white; padding-top:10px; border-radius:10px
            }
            .resp-category-img {
                display:block; margin:auto; width:50px; height:50px
            }
            .resp-text {
                font-size:12px;
                padding-top:5px; text-align:center
            }
            .resp-product {
                width:125px; height:170px; background-color:white; padding:5px;
                border-radius:5px; border:2px solid white;
                margin-bottom:20px;
            }
            .resp-product-img {
                display:block; margin:auto; width:110px; height:110px; margin-bottom:5px
            }
        }
        @media only screen and (max-width: 750px) {
            .content-box {
               background-color:#e8907d; margin:auto; margin-top:100px; padding:20px; border-radius:5px
            }
        }
        @media only screen and (max-width: 630px) {
            .content-box {
                background-color:#e8907d; margin-top:100px; padding:20px; border-radius:5px;
              
            }
        }
        .justify-content-between{
            flex-wrap:wrap;
        }
    </style>
</head>
<body style="background-color:#ebd9eb">
    <?php include "includes/navbar.php"?>
    <div class="content-box">
        <h1 style="font-size:18pt; margin-bottom:25px; color:black">Shop by Category</h1>
        <div class="resp-category-button-div button-left">
            <img src="resource/icons/left arrow.png" alt="left" class="resp-category-button">
        </div>
        <div class="resp-category-button-div button-right">
            <img src="resource/icons/right arrow.png" alt="right" class="resp-category-button">
        </div>
        <div class="d-flex justify-content-center align-items-center" style="gap:10px;flex-wrap:wrap;">
            <div class="resp-category" onclick="window.location.href='category.php'">
                <img src="resource/icons/electronics.png" alt="Electronics" class="resp-category-img">
                <p class="resp-text">Electronics</p>
            </div>
            <div class="resp-category" onclick="window.location.href='category.php'">
                <img src="resource/icons/furnitures.png" alt="Furnitures" class="resp-category-img">
                <p class="resp-text">Furnitures</p>
            </div>
            <div class="resp-category" onclick="window.location.href='category.php'">
                <img src="resource/icons/mens fashion.png" alt="Men's Fashion" class="resp-category-img">
                <p class="resp-text">Men's Fashion</p>
            </div>
            <div class="resp-category" onclick="window.location.href='category.php'">
                <img src="resource/icons/womens fashion.png" alt="Women's Fashion" class="resp-category-img">
                <p class="resp-text">Women's Fashion</p>
            </div>
        </div>
    </div>
    <div class="content-box" style="margin-top:30px; margin-bottom:40px">
        <h1 style="font-size:18pt; margin-bottom:25px; color:black">Products</h1>
        <div class="d-flex justify-content-center" style="flex-wrap:wrap;gap:10px;">
            <?php
                $stmt= $conn->prepare("SELECT * FROM product");
                $stmt->execute();
                while($row = $stmt->fetch()):
            ?>
            <div class="resp-product" onclick="window.location.href = 'detailProduct.php?product_id=<?= $row['product_id'] ?>'">
                <img src="<?= $row['product_img'] ?>" alt="<?= $row['product_name'] ?>" class="resp-product-img">
                <p class="resp-text bold-text"><?= $row['product_name'] ?></p>
            </div>
            <?php endwhile; ?>
            <!-- <div class="resp-product">
                <img src="resource/img/product/pajamas.jpg" alt="Pajamas" class="resp-product-img">
                <p class="resp-text bold-text">Pajamas</p>
            </div>
            <div class="resp-product">
                <img src="resource/img/product/shoes.jpg" alt="Shoes" class="resp-product-img">
                <p class="resp-text bold-text">Shoes</p>
            </div>
            <div class="resp-product">
                <img src="resource/img/product/cap.jpg" alt="Cap" class="resp-product-img">
                <p class="resp-text bold-text">Cap</p>
            </div> -->
        </div>
        <!-- <div class="d-flex justify-content-between">
            <div class="resp-product">
                <img src="resource/img/product/pajamas.jpg" alt="Pajamas" class="resp-product-img">
                <p class="resp-text bold-text">Pajamas</p>
            </div>
            <div class="resp-product">
                <img src="resource/img/product/shoes.jpg" alt="Shoes" class="resp-product-img">
                <p class="resp-text bold-text">Shoes</p>
            </div>
            <div class="resp-product">
                <img src="resource/img/product/cap.jpg" alt="Cap" class="resp-product-img">
                <p class="resp-text bold-text">Cap</p>
            </div>
            <div class="resp-product">
                <img src="resource/img/product/pajamas.jpg" alt="Pajamas" class="resp-product-img">
                <p class="resp-text bold-text">Pajamas</p>
            </div>
        </div> -->
    </div>
    <footer style="padding:20px">
        <p class="text-dark" style="text-align:center; font-size:12px; color:#8c52ff">© 2022 BelaBeli</p>
    </footer>
</body>
</html>
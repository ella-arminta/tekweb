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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <style>
        .content-box {
            width:70%; background-color:#e8907d; margin:auto; margin-top:100px; padding:25px; border-radius:5px
        }
        .resp-category {
            height:150px; width:150px; background-color:white; padding-top:10px; border-radius:10px; margin:auto
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
        .justify-content-between {
            flex-wrap:wrap;
        }
    </style>
</head>
<body style="background-color:#ebd9eb">
    <?php include "includes/navbar.php"?>
    <div class="content-box">
        <h1 style="font-size:18pt; margin-bottom:25px; color:black">Shop by Category</h1>
        <div id="multiple-items" style="width:calc(100% - 45px); margin:auto">
            <div>
                <div class="resp-category" onclick="window.location.href='category.php'">
                    <img src="resource/icons/electronics.png" alt="Electronics" class="resp-category-img">
                    <p class="resp-text">Electronics</p>
                </div>
            </div>
            <div>
                <div class="resp-category" onclick="window.location.href='category.php'">
                    <img src="resource/icons/furnitures.png" alt="Furnitures" class="resp-category-img">
                    <p class="resp-text">Furnitures</p>
                </div>
            </div>
            <div>
                <div class="resp-category" onclick="window.location.href='category.php'">
                    <img src="resource/icons/mens fashion.png" alt="Men's Fashion" class="resp-category-img">
                    <p class="resp-text">Men's Fashion</p>
                </div>
            </div>
            <div>
                <div class="resp-category" onclick="window.location.href='category.php'">
                    <img src="resource/icons/womens fashion.png" alt="Women's Fashion" class="resp-category-img">
                    <p class="resp-text">Women's Fashion</p>
                </div>
            </div>
            <div>
                <div class="resp-category" onclick="window.location.href='category.php'">
                    <img src="resource/icons/mobile phones.png" alt="Mobile Phones" class="resp-category-img">
                    <p class="resp-text">Mobile Phones</p>
                </div>
            </div>
            <div>
                <div class="resp-category" onclick="window.location.href='category.php'">
                    <img src="resource/icons/photography.png" alt="Photography" class="resp-category-img">
                    <p class="resp-text">Photography</p>
                </div>
            </div>
            <div>
                <div class="resp-category" onclick="window.location.href='category.php'">
                    <img src="resource/icons/stationery.png" alt="Stationery" class="resp-category-img">
                    <p class="resp-text">Stationery</p>
                </div>
            </div>
            <div>
                <div class="resp-category" onclick="window.location.href='category.php'">
                    <img src="resource/icons/video games.png" alt="Video Games" class="resp-category-img">
                    <p class="resp-text">Video Games</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#multiple-items').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4
            });
        })
    </script>
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
        </div>
    </div>
    <footer style="padding:20px">
        <p class="text-dark" style="text-align:center; font-size:12px; color:#8c52ff">© 2022 BelaBeli</p>
    </footer>
</body>
</html>
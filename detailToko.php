<?php
    include 'api/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>ambil nama toko</title>
        <!-- <style>
            .productContent {
                border : 1px solid;
                width : auto;
                height : auto;
            }
        </style> -->
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php include 'includes/navbar.php'; ?>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h3 style="float">BelaBeli.com</h3>
                </div>
                <div class="col-md-9">
                    <p> search <p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?php
                        $userID = 1;
                        $stmt = $conn->prepare("SELECT * FROM user WHERE user_id = ?");
                        $stmt->execute([$userID]);
                        $row = $stmt->fetch();
                        echo '<h3>'.$row['username'].'</h3><br>'.'<h5>'.'@'.$row['fullname'];
                    ?>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <h4>Listings</h4>
                    </div>
                    <div class="row productContent">
                        <div class="container border border-dark border-opacity-25 p-5 rounded-1">
                            <div class="row">
                                <?php
                                    $userID = 1;
                                    $stmt = $conn->prepare("SELECT * FROM product WHERE user_id = ?");
                                    $stmt->execute([$userID]);
                                    while($row = $stmt->fetch()){
                                        echo '<div class="col-md-4 col-sm-6">
                                        <div class="card">
                                            <img class="card-img-top" src="images/box.jpg" alt="Card image" style="width:100%;">
                                            <div class="card-body">
                                            <h4 class="card-title">'.$row['product_name'].'</h4>
                                            <p class="card-text">Rp '.$row['product_price'].'</p>
                                            <a href="#" class="btn btn-primary btn-buy" data-bs-toggle="modal" data-bs-target="#buyModal">Buy</a>
                                            <a href="#" class="btn btn-danger btn-addcart">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>
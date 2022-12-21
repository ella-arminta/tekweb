<?php
    include 'api/connect.php';
    $userID = 1;
    $stmt = $conn->prepare("SELECT * FROM user WHERE user_id = ?");
    $stmt->execute([$userID]);
    $row = $stmt->fetch();

    if (isset($_POST['searchIcon'])) {
        $item = trim($_POST['searchToko']);
        header('location: detailToko.php?item='.$item.'&mes=find');
    }
    else if (isset($_POST['crossIcon']))  {
        header('location: detailToko.php');
    }
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
        <title><?php echo 'BelaBeli.com/'.$row['username'] ?></title>
        <style>
            .pp {
                height : 170px;
                object-fit : cover;
                width : 200px;
                border-radius : 200px;
            }
            .logo {
                height : 90px;
                width : 90px;
                padding : 10px;
            }
            .user {
                padding-left : 40px;
            }
        </style>
    </head>
    <body>
        <!-- modal kalo buyer sudah membeli -->
        <div class="modal" id="purchased">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                    <h4 class="modal-title">Buy Product</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
    
                    <div class="modal-body">
                        <div style="margin-bottom:10px;"><strong>Barang Berhasil Dibeli!</strong></div>
                    </div>
            
                </div>
            </div>
        </div>
       <!-- modal kalo buyer pencet buy -->
        <div class="modal" id="ModalForBuy">
            <div class="modal-dialog">
                <div class="modal-content">
            
                    <div class="modal-header">
                    <h4 class="modal-title">Buy Product</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div style="margin-bottom:10px;"><strong>Quantity</strong></div>
                        <input type="number" class="form-control" min="1" value="1">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#purchased">Buy</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
            
                </div>
            </div>
        </div>
    
        <div class="container-fluid">
            <div class="row">
                <?php include 'includes/navbar.php'; ?>
            </div>
            <!-- <div class="row bg-danger">
                <div class="col-md-2">
                    <img class="logo" src="resource/img/logo/logo.PNG"> -->
                    <!-- <h3 style="float">BelaBeli.com</h3> -->
                <!-- </div>
                <div class="col-md-10">
                    <p> search <p>
                </div>
            </div> -->
            <br>
            <div class="row" style="margin-top:66px">
                <div class="col-md-3 col-sm-2 user">
                    <div class="row">
                        <?php 
                            echo '<img class="rounded-circle shadow-4-strong pp" alt="avatar2" src="'.$row['profilepic'].'">';
                        ?>
                    </div>
                    <div class="row">
                        <?php
                            echo '<h3>'.$row['fullname'].'</h3>'.'<h5>'.'@'.$row['username'];
                        ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-5"><h4>Listings</h4></div>
                        <div class="col-md-7">
                            <form method="post">
                            <div class="row">
                                <?php
                                    if (isset($_GET['mes']) && $_GET['mes']=='find') {
                                        echo '<div class="col-md-10"><input placeholder="'.$_GET['item'].'"type="text" class="form-control" name="searchToko"></div>
                                        <div class="col-md-2"><button name="crossIcon" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-backspace-reverse-fill" viewBox="0 0 16 16">
                                        <path d="M0 3a2 2 0 0 1 2-2h7.08a2 2 0 0 1 1.519.698l4.843 5.651a1 1 0 0 1 0 1.302L10.6 14.3a2 2 0 0 1-1.52.7H2a2 2 0 0 1-2-2V3zm9.854 2.854a.5.5 0 0 0-.708-.708L7 7.293 4.854 5.146a.5.5 0 1 0-.708.708L6.293 8l-2.147 2.146a.5.5 0 0 0 .708.708L7 8.707l2.146 2.147a.5.5 0 0 0 .708-.708L7.707 8l2.147-2.146z"/>
                                      </svg></button></div>';
                                    }
                                    else {
                                        echo '<div class="col-md-10"><input placeholder="What do you want to find?"type="text" class="form-control" name="searchToko"></div>
                                        <div class="col-md-2"><button name="searchIcon" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                                        <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
                                        <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
                                        </svg></button></div>';
                                    }
                                ?>
                            </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="container border border-dark border-opacity-25 p-5 rounded-1">
                            <div class="row">
                                <?php
                                    if (isset($_GET['mes']) && $_GET['mes']=='find') {
                                        $stmt = $conn->prepare("SELECT * FROM product WHERE user_id = ? AND product_name LIKE '%".$_GET['item']."%'");
                                        $stmt->execute([$userID]);
                                        if ($stmt->rowCount()==0) {
                                            echo '<p class="text-center">No Product Found That Matches the Keyword. Try Another One.</p>';
                                        }
                                        else {
                                            while($row = $stmt->fetch()){
                                                echo '<div class="col-md-4 col-sm-6 p-2">
                                                <div class="card">';
                                                if ($row['product_img'] == null) {
                                                    echo '<p class="container text-center gy-10 py-5">No Image Available</p>';
                                                }
                                                else {
                                                    echo '<img class="card-img-top" src="'. $row['product_img'] .'" alt="Card image" style="width:100%;">';
                                                };
                                                echo '<div class="card-body">
                                                <h4 class="card-title">'.$row['product_name'].'</h4>
                                                <p class="card-text">Rp '.$row['product_price'].'</p>
                                                <a href="#" class="btn btn-outline-warning btn-buy" data-bs-toggle="modal" data-bs-target="#ModalForBuy">Buy</a>
                                                <a href="detailProduct.php?product_id='.$row['product_id'].'" class="btn btn-info btn-addcart">View Details</a>
                                                </div>
                                                </div>
                                            </div>';
                                            }
                                        }
                                    }
                                    else {
                                        $stmt = $conn->prepare("SELECT * FROM product WHERE user_id = ?");
                                        $stmt->execute([$userID]);
                                        if ($stmt->rowCount()==0) {
                                            echo '<p class="text-center">This User Has No Listing</p>';
                                        }
                                        else {
                                            while($row = $stmt->fetch()){
                                                echo '<div class="col-md-4 col-sm-6 p-2">
                                                <div class="card">';
                                                if ($row['product_img'] == null) {
                                                    echo '<p class="container text-center gy-10 py-5">No Image Available</p>';
                                                }
                                                else {
                                                    echo '<img class="card-img-top" src="'. $row['product_img'] .'" alt="Card image" style="width:100%;">';
                                                };
                                                    echo '<div class="card-body">
                                                    <h4 class="card-title">'.$row['product_name'].'</h4>
                                                    <p class="card-text">Rp '.$row['product_price'].'</p>
                                                    <a href="#" class="btn btn-outline-warning btn-buy" data-bs-toggle="modal" data-bs-target="#ModalForBuy">Buy</a>
                                                    <a href="detailProduct.php?product_id='.$row['product_id'].'" class="btn btn-info btn-addcart">View Details</a>
                                                    </div>
                                                </div>
                                            </div>';
                                            }
                                        }
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
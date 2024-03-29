<?php
    include 'api/connect.php';
    
    if((!isset($_GET['product_id'])) || empty($_GET['product_id']) || !is_numeric($_GET['product_id'])) {
        header('Location: index.php');
    } else {
    $product_id = $_GET['product_id'];

    $sql = 'SELECT * 
            FROM product p join user u on p.user_id = u.user_id
            WHERE p.product_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$product_id]);
    $row = $stmt->fetch();
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
        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/e52db3bf8a.js" crossorigin="anonymous"></script>
        <title>Detail Product</title>

        <style>
            .photo{
                padding-left : 20px;
            }
            .product {
                padding-left : 30px;
            }

            hr {
            display: block;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            margin-left: auto;
            margin-right: auto;
            border-style: inset;
            border-width: 1px;
            }
            .pp {
                height: 100px;
                object-fit: cover;
                width: 100px;
                border-radius: 200px;
            }
            @media(max-width:777px){
                .tulisan{
                    text-align:center;
                }
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php include 'includes/navbar.php'; ?>
            </div>
            <br>

            <div class="row" style="margin-top:66px">
                <div class="col-md-4 col-sm-4 photo">
                    <div class="container border border-dark border-opacity-25 rounded-1">
                        <?php
                                if ($row['product_img'] == null) {
                                    echo '<p class="container text-center gy-10 py-5">No Image Available</p>';
                                }
                                else {
                                    echo '<img class="card-img-top" src="'. $row['product_img'] .'" alt="Card image" style="width:100%;">';
                                };
                        ?>
                    </div>
                </div>

                <div class="col-md-8 col-sm-8 product">
                    <div class="row">
                        <div class="col">
                            <?php
                            echo '<h4>'.$row['product_name'].'</h4>';
                            echo '<h4>'.$row['product_price'].'</h4>';
                            ?>
                        </div>
                       <div class="col">
                        <?php
                            if(isset($_SESSION['user_id'])){
                                $stmt=$conn->prepare("SELECT * FROM favourites where product_id =? and user_id=?");
                                $stmt->execute([$product_id,$_SESSION['user_id']]);
                                if($stmt->rowCount() > 0 ){
                                    $like = $stmt->fetch();
                                    if($like['golike'] == '1'){ ?>
                                        <i class="fa-solid fa-heart fa-2xl" onclick="like(0)" style="cursor:pointer;color:red"></i>
                                    <?php } else{ ?>
                                        <i class="fa-regular fa-heart fa-2xl" onclick="like(1)" style="cursor:pointer;color:red"></i>
                                    <?php }
                                } else { ?>
                                <i class="fa-regular fa-heart fa-2xl" onclick="like(1)" style="cursor:pointer;color:red"></i>
                                <?php } ?>
                        
                       
                        <?php }; ?>
                       
                       </div>
                    </div>
                    <hr>

                    <div class="row">
                        <h5>Descriptions</h5>
                        <div>
                            <?php
                                echo 'Weight : ' . $row['product_weight'] . '<br>';
                                echo 'Size : ' . $row['product_size'] . '<br>';
                                echo 'Describe : ' . $row['product_desc'] . '<br>';
                                echo 'Category : ' . $row['product_category'];
                            ?>
                        </div>
                    </div>
                    <div style="width:100%;display:flex;justify-content:center;align-items:center;">
                        <div onclick="window.location.href = 'detailToko.php?user_id=<?= $row['user_id']?>'" style="width:80%;box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;border-radius:30px;padding:20px;margin-top:10px;cursor:pointer">
                            <div class="row justify-content-start">
                                <div class="col-md-3" style="display:flex;justify-content:center;align-items:center">
                                    <!-- profile picture -->
                                    <?php 
                                        echo '<img class="rounded-circle shadow-4-strong pp" alt="avatar2" src="'.$row['profilepic'].'">';
                                    ?>
                                </div>
                                <div class="col-md-9 tulisan">
                                <?php
                                    echo '<b>'.$row['fullname'].'</b> @'.$row['username'].'</br>';
                                ?>
                                    <?php if(!isset($_SESSION['user_id'])){?>
                                        <a href = "user/login.php"><button class="btn btn-success" style="margin-top:5%">Login first to Chat/Buy Product</button></a>
                                    <?php } else{?>
                                    <form action="user/personalChat.php" method="POST">
                                        <input type="text" style="display:none" name="product_id" value="<?= $product_id ?>">
                                        <input type="text" style="display:none" name="aku_id" value="<?= $_SESSION['user_id']; ?>">
                                        <input type="text" style="display:none" name="dia_id" value="<?= $row['user_id']; ?>">
                                        <button class="btn btn-success"type="submit" style="margin-top:5%">Chat/Buy Product</button>
                                    </form>
                                    <?php } ?>
                                </div>
                            </div>
                                
                            <div></div>
                        </div>
                    </div>
                </div>

                

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
        <script>
            $(document).ready(function(){

            })
            function like(bool){
                $.ajax({
                    type: "POST",
                    url: "api/like.php",
                    data: {
                        like:bool,
                        product_id:<?= $product_id ?>
                    },
                    success: function (response) {
                        if(response == 1){
                            $('.fa-heart').removeClass('fa-regular');
                            $('.fa-heart').addClass('fa-solid')
                        }else if(response == 0){
                            $('.fa-heart').removeClass('fa-solid');
                            $('.fa-heart').addClass('fa-regular')
                        }
                    }
                });
            }
        </script>
    </body>
</html>

<?php
        
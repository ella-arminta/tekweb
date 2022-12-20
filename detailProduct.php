<?php
    include 'api/connect.php';
    
    if((!isset($_GET['product_id'])) || empty($_GET['product_id']) || !is_numeric($_GET['product_id'])) {
        header('Location: index.php');
    } else {
    $product_id = $_GET['product_id'];

    $sql = 'SELECT * 
            FROM product
            WHERE product_id = ?';
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
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php include 'includes/navbar.php'; ?>
            </div>
            <br>

            <div class="row">
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
                        <?php
                        echo '<h4>'.$row['product_name'].'</h4>';
                        echo '<h4>'.$row['product_price'].'</h4>';
                        ?>
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
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-md-2">
                    <div class="container border border-dark border-opacity-25 p-5 rounded-1">
                            halo
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                </div>
            </div>

        </div>
    </body>
</html>

<?php
        
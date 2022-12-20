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
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php include 'includes/navbar.php'; ?>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="container border border-dark border-opacity-25 rounded-1">
                        <?php
                        if (isset($_GET['product_id'])){
                            $stmt = $conn->prepare("SELECT * FROM product WHERE product_id = ?");
                            $stmt->execute([$product_id]);
                            while($row = $stmt->fetch()){
                                // echo '<div class="col-md-4 col-sm-6 p-2">
                                // <div class="card">';
                                if ($row['product_img'] == null) {
                                    echo '<p class="container text-center gy-10 py-5">No Image Available</p>';
                                }
                                else {
                                    echo '<img class="card-img-top" src="'. $row['product_img'] .'" alt="Card image" style="width:100%;">';
                                };
                                echo '<div class="card-body">
                                
                                </div>
                                </div>
                            </div>';
                            echo $row['product_name'];
                            echo $row['product_price'];

                            // <h4 class="card-title">'.$row['product_name'].'</h4>
                            // <p class="card-text">Rp '.$row['product_price'].'</p
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h5>Descriptions</h5>
                    <?php
                    if (isset($_GET['product_id'])){
                        $stmt = $conn->prepare("SELECT * FROM product WHERE product_id = ?");
                        $stmt->execute([$product_id]);
                        $row = $stmt->fetch();
                        echo $row['product_size'];
                    }
                    ?>
                    
                </div>
            </div>

        </div>
    </body>
</html>

<?php
        
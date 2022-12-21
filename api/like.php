<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id =$_SESSION['user_id'];
    $pro_id = $_POST['product_id'];
    $bool = $_POST['like'];
    if($bool == 1 or $bool == 0){
        $stmt = $conn->prepare("SELECT * FROM favourites where user_id= ? and product_id=?");
        $stmt->execute([$user_id,$pro_id]);
        if($stmt->rowCount() < 1 ){
            $stmt = $conn->prepare("INSERT INTO `favourites`( `user_id`, `product_id`, `golike`) VALUES (?,?,?)");
            $berhasil = $stmt->execute([$user_id,$pro_id,$bool]);
            if($berhasil){
                echo $bool;
            }
            else{
                echo 'failed';
            }
        }else{
            $stmt = $conn->prepare("UPDATE favourites set golike=? where user_id = ? and product_id =?");
            $berhasil = $stmt->execute([$bool,$user_id,$pro_id]);
            if($berhasil){
                echo $bool;
            }else{
                echo 'gagal';
            }
        }
    }else{
        echo 'fail';
    }

}
?>
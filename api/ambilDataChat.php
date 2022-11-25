<?php
include 'connect.php';
if(isset($_GET['id'])){
    // echo $_GET['id'];
    $arrayOfChat = [];
    $stmt = $conn->prepare("SELECT * FROM chat");
    $stmt->execute();
    while($row = $stmt->fetch()){
        array_push($arrayOfChat, $row);
    }
    echo json_encode($arrayOfChat);
    // [
    //     [1,12,100]
    //     [2,2,4]
    // ]
}
?>
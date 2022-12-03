<?php
include 'connect.php';
if(isset($_POST['tipe'])){
    $tipe = $_POST['tipe'];
    if($tipe == 'getMsg'){ //get chat terbaru
        $msgs = [];
        $chat_id = $_POST['chat_id'];
        $msg_id = $_POST['latest'];
        $stmt = $conn->prepare("SELECT * FROM message where chat_id = ? and msg_id > ?");
        $berhasil = $stmt->execute([$chat_id,$msg_id]);
        while($msg = $stmt->fetch()){
            array_push($msgs,$msg);
        }   
        if($berhasil){
            $berhasil = 'success';
        }else{
            $berhasil ='gagal';
        }
        // get latest message
        $stmt = $conn->prepare("SELECT max(msg_id) as msg_id FROM message where chat_id = ?");
        $stmt->execute([$chat_id]);
        $latest = $stmt->fetch();
        $latest = $latest['msg_id'];
        echo json_encode([$berhasil,$msgs,$latest]);
    }
}
?>

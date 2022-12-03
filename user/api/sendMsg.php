<?php
include 'connect.php';
if(isset($_POST['tipe'])){
    $tipe = $_POST['tipe'];
    if($tipe == 'send'){ //kirim chat baru
        $sender_id = $_POST['sender_id'];
        $chat_id = $_POST['chat_id'];
        $msg = $_POST['isi'];
        $stmt=$conn->prepare("INSERT INTO message (msg,sender_id,chat_id) values (?,?,?)");
        $berhasil = $stmt->execute([$msg,$sender_id,$chat_id]);
        if($berhasil){
            echo json_encode(['success']);
        }else{
            echo json_encode(['gagal']);
        }
        
    }
    
}
?>
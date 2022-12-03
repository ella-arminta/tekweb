<?php
    include 'api/connect.php';
    $aku_id = 12;
    $kamu_id = 100;
    $chat_id = null;
    $stmt = $conn->prepare("SELECT chat_id FROM chat where (user_id1 = ? and user_id2 =?) or (user_id1 = ? and user_id2 =?)");
    $stmt->execute([$aku_id,$kamu_id,$kamu_id,$aku_id]);
    if($stmt->rowCount() > 0){
        $chat = $stmt->fetch();
        $chat_id = $chat['chat_id'];
    }else{
        $stmt = $conn->prepare("INSERT INTO chat (user_id1,user_id2) values (?,?)");
        $stmt->execute([$aku_id,$kamu_id]);
        $stmt = $conn->prepare("SELECT chat_id FROM chat where (user_id1 = ? and user_id2 =?) or (user_id1 = ? and user_id2 =?)");
        $stmt->execute([$aku_id,$kamu_id,$kamu_id,$aku_id]);
        $chat = $stmt->fetch();
        $chat_id = $chat['chat_id'];
    }
    echo $chat_id;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="style/pc.css">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/e52db3bf8a.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- navbar -->
    <nav class="nav row">
        <div class="col-2">
            <a href="listChat.php" style="color:black"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
        </div>
        <div class="col-2">
                <!-- pp -->
                <div class="col-3">
                <img src="https://pub-static.fotor.com/assets/projects/pages/d5bdd0513a0740a8a38752dbc32586d0/fotor-03d1a91a0cec4542927f53c87e0599f6.jpg" class="pp" alt="">
            </div>
        </div>
        <div class="col-8">
        <h4>username</h4>
            <p>~ nama</p>
        </div>
    </nav>
    <div class="body">
        <div class="chats">
            <div class="bubble">
                <div class="chatbox">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                </div>
                <p>15:19</p>
            </div>
            <div class="bubble">
                <div class="chatbox">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                </div>
                <p>15:19</p>
            </div>
            <div class="bubble mybubble">
                <p>15:19</p>
                <div class="chatbox">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                </div>
            </div>
        </div>
        <div class="write">
            <textarea placeholder="Tulis Pesan..."></textarea>
            <i class="fa-solid fa-paper-plane fa-2xl send"></i>
        </div>
    </div>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="../script/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function() {
            var navHeight = $('.nav').height()
            $('.body').css('height','calc(100vh - '+navHeight+'px')
            $('.body').css('margin-top',navHeight)
            $('.chats').css('height','calc(89vh - '+navHeight+'px)')
            $('.write').css('height','calc(11vh)')
            $('.write textarea').css('height','calc(10vh - 10px)')
            $('.send').css('display','none')
            $('.write textarea').on('keyup',function(){
                if ($(this).val() != ''){
                    $('.send').fadeIn();
                    // $('.send').css('display','block')
                }else{
                    $('.send').fadeOut();
                    // $('.send').css('display','none')
                }
            })
        });
    </script>
</body>
</html>
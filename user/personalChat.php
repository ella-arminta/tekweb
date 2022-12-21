<?php
    include 'api/connect.php';
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: listChat.php');
    }
    if(!isset($_POST['chat_id'])){
        $aku_id = $_POST['aku_id'];
        $kamu_id = $_POST['dia_id'];
        $chat_id = null;
        $stmt = $conn->prepare("SELECT chat_id FROM chat where (user_id1 = ? and user_id2 =?) or (user_id1 = ? and user_id2 =?)");
        $stmt->execute([$aku_id,$kamu_id,$kamu_id,$aku_id]);
        if($stmt->rowCount() > 0){ //cek apakah udah pernah ngechat belum. Kalau sudah :
            $chat = $stmt->fetch();
            $chat_id = $chat['chat_id'];
        }else{ // kalau belum pernah ngechat sebelumnya :
            $valid = True;
            $stmt = $conn->prepare("SELECT * FROM user where user_id = ?");
            $stmt->execute([$aku_id]);
            if($stmt->rowCount() <= 0){ //cek user1 ada gak di tabel user
                $valid =False;
            }
            if($valid){ // cek user 2 ada gk di tabel user
                $stmt = $conn->prepare("SELECT * FROM user where user_id = ?");
                $stmt->execute([$kamu_id]);
                if($stmt->rowCount() <= 0){
                    $valid = False;
                }
            }
            if(!$valid){ // kalo gk ada 2-2 nya :
                // header('Location: ../');
            }
            // kalo valid maka buat ruang chat baru
            $stmt = $conn->prepare("INSERT INTO chat (user_id1,user_id2) values (?,?)");
            $stmt->execute([$aku_id,$kamu_id]);
            $stmt = $conn->prepare("SELECT chat_id FROM chat where (user_id1 = ? and user_id2 =?) or (user_id1 = ? and user_id2 =?)");
            $stmt->execute([$aku_id,$kamu_id,$kamu_id,$aku_id]);
            $chat = $stmt->fetch();
            $chat_id = $chat['chat_id'];
        }
    }else{
        $chat_id = $_POST['chat_id'];
        $aku_id = $_POST['aku_id'];
        $kamu_id = $_POST['dia_id'];
    }
    
    if($chat_id == null){
        header("Location :../");
    }
    // data aku
    $stmt = $conn->prepare("SELECT * from user where user_id =?");
    $stmt->execute([$aku_id]);
    $aku = $stmt->fetch();
    // dari kamu
    $stmt = $conn->prepare("SELECT * from user where user_id =?");
    $stmt->execute([$kamu_id]);
    $kamu = $stmt->fetch();
        // inisial kamu
    $nama = $kamu['fullname'];
    $array = explode(' ', $nama, 2);
    // $inisial = strtoupper(substr($array[0],0,1) .substr($array[1],0,1));
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
            <?php if(isset($_POST['product_id'])){?>
                <a href="../detailProduct.php?product_id=<?= $_POST['product_id'] ?>" style="color:black"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
            <?php }else{ ?>
            <a href="listChat.php" style="color:black"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
            <?php } ?>
        </div>
        <div class="col-2">
            <!-- pp -->
            <div class="col-3">
                <!-- <img src="https://pub-static.fotor.com/assets/projects/pages/d5bdd0513a0740a8a38752dbc32586d0/fotor-03d1a91a0cec4542927f53c87e0599f6.jpg" class="pp" alt=""> -->
                <!-- <div class="pp">
                    <?php // $inisial ?>
                </div> -->
                <img src="../<?= $kamu['profilepic'] ?>" style="object-fit:cover" class="pp" alt="">
            </div>
        </div>
        <div class="col-8">
        <h4><?= $kamu['username'] ?></h4>
            <p>~ <?=$kamu['fullname']?></p>
        </div>
    </nav>
    <div class="body">
        <div class="chats">
            <?php
                $stmt = $conn->prepare("SELECT * FROM message where chat_id =?");
                $stmt->execute([$chat_id]);
                while($msg = $stmt->fetch()):
            ?>
                <?php if ($msg['sender_id'] == $aku['user_id']): // sendernya yang tanya produk?>
                    <div class="bubble mybubble">
                        <p>
                            <?php
                            $date = $msg['timestamp'];
                            $date = strtotime($date);
                            echo date('H:i', $date)
                            ?>
                        </p>
                        <div class="chatbox">
                         <?= $msg['msg'] ?>
                        </div>
                    </div>
                <?php else: //sendernya yang jual?> 
                    <div class="bubble">
                        <div class="chatbox">
                        <?= $msg['msg'] ?>
                        </div>
                        <p>
                            <?php
                            $date = $msg['timestamp'];
                            $date = strtotime($date);
                            echo date('H:i', $date)
                            ?>
                        </p>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
            
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
        var latestMsg = "<?php 
            $stmt=$conn->prepare("SELECT max(msg_id) as msg_id from message where chat_id = ?");
            $stmt->execute([$chat_id]);
            $latest = $stmt->fetch();
            echo $latest['msg_id'];
        ?>"
        sender = <?= $aku['user_id']?>;
        function loadMsg(v_chat_id){
            $.ajax({
                type: "POST",
                url: "api/getMsg.php",
                data: {
                    chat_id: v_chat_id,
                    latest : latestMsg,
                    tipe:'getMsg'
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if(response[0] == 'success'){
                        var msgs = response[1];
                        bubles = '';
                        for (const key in msgs) {
                            timestamp = msgs[key]['timestamp'];
                            timestamp = new Date(timestamp)
                            time = timestamp.getHours() + ':' + timestamp.getMinutes();
                            if(msgs[key]['sender_id'] == sender){ //kalau sendernya adalah aku
                                bubles += `
                                <div class="bubble mybubble">
                                    <p>
                                    `+time+`
                                    </p>
                                    <div class="chatbox">
                                    `+msgs[key]['msg']+`
                                    </div>
                                </div>
                                `
                            }else{
                                bubles += `
                                <div class="bubble">
                                    <div class="chatbox">
                                    `+msgs[key]['msg']+`
                                    </div>
                                    <p>
                                    `+time+`
                                    </p>
                                </div>
                                `
                            }
                            
                        }
                        $('.chats').append(bubles);
                        latestMsg = response[2];
                      
                    }
                }
            });
        }
        $(document).ready(function() {
            var navHeight = $('.nav').height()
            $('.body').css('height','calc(100vh - '+navHeight+'px')
            $('.body').css('margin-top',navHeight)
            $('.chats').css('height','calc(89vh - '+navHeight+'px)')
            $('.write').css('height','calc(11vh)')
            $('.write textarea').css('height','calc(9vh - 10px)')
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
            $('.send').click(function(){
                chat = <?= $chat_id ?>;
                var msg = $('.write textarea').val();
                $('.write textarea').val('');
                $.ajax({
                    type: "post",
                    url: "api/sendMsg.php",
                    data: {
                        tipe : 'send',
                        isi:msg,
                        sender_id :sender, 
                        chat_id : chat
                    },
                    success: function (response) {
                        response = JSON.parse(response);
                        if(response[0] == 'success'){
                            loadMsg(chat);
                            setTimeout(() => {
                                var d = $('.chats');
                            d.scrollTop(d.prop("scrollHeight"));
                            }, 100);
                           
                        }
                    }
                });
            })
            var d = $('.chats');
            d.scrollTop(d.prop("scrollHeight"));
            var intervalId = window.setInterval(function(){
                loadMsg(<?= $chat_id ?>);
                
            }, 2000);
        });
        
    </script>
</body>
</html>
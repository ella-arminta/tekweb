<?php
include 'api/connect.php';
$aku_id = 2;
$chat_ids = [];
$stmt = $conn->prepare("SELECT * FROM chat where user_id1 =? or user_id2 =?");
$stmt->execute([$aku_id,$aku_id]);
while($chat = $stmt->fetch()){
    array_push($chat_ids,$chat['chat_id']);
}
function get_words($sentence, $count) {
    preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
    return $matches[0];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="style/chat.css">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/e52db3bf8a.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- judul -->
    <div class="display-inline-block">
        <a href="../"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
        <h2>Chat</h2>
    </div>
    <!-- chats -->
    <div class="chats">
        <?php
        if($chat_ids > 0){
            $placeHolders = implode(', ', array_fill(0, count($chat_ids), '?'));
            $stmt = $conn->prepare("SELECT * FROM message m1 
            join chat c on m1.chat_id = c.chat_id
            where m1.chat_id in ($placeHolders) and m1.timestamp = (select max(m2.timestamp) from message m2 where m1.chat_id = m2.chat_id ) order by timestamp desc");
            foreach ($chat_ids as $index => $value) {
                $stmt->bindValue($index + 1, $value, PDO::PARAM_INT);
            }   
            $stmt->execute();
            if($stmt->rowCount() == 0){
                echo '<div style="color:gray;display:flex;justify-content:center;align-items:center;height:80vh;"><h1>Belum ada chat</h1></div>';
            }
            while ($chat =  $stmt->fetch()){
                if($chat['user_id1'] == $aku_id){
                    $dia_id = $chat['user_id2'];
                }else{
                    $dia_id = $chat['user_id1'];
                }
                $stmt2 = $conn->prepare("SELECT * from user where user_id = ?");
                $stmt2->execute([$dia_id]);
                $dia = $stmt2->fetch();
                ?>
                <form action="personalChat.php" class="chat-<?= $chat['chat_id'] ?>" method="post">
                <div class="row chat-row align-items-center" onclick="chatwith(<?= $chat['chat_id'] ?>)">
                    <div style="display:none">
                        <input type="text" name="aku_id" value="<?= $aku_id ?>">
                        <input type="text" name="dia_id" value="<?= $dia['user_id']; ?>">
                        <input type="text" name="chat_id" value="<?= $chat['chat_id']?>">
                    </div>
                    <!-- pp -->
                    <div class="col-3">
                        <!-- <img src="https://pub-static.fotor.com/assets/projects/pages/d5bdd0513a0740a8a38752dbc32586d0/fotor-03d1a91a0cec4542927f53c87e0599f6.jpg" class="pp" alt=""> -->
                        <div class="pp">
                            <?php
                                $nama = $dia['fullname'];
                                $array = explode(' ', $nama, 2);
                                $inisial = strtoupper(substr($array[0],0,1) .substr($array[1],0,1)); 
                                echo $inisial ;
                            ?>
                        </div>
                    </div>
                    <div class="col-7">
                        <h4 style="display:inline-block"><?= $dia['username'] ?></h4>
                        <h4 style="display:inline-block">~ <?= $dia['fullname'] ?></h4>
                        <p>
                        <?php //sneak peak
                        $sentence = $chat['msg'];
                        echo get_words($sentence,14);
                        ?>
                        </p>
                    </div>
                    <div class="col-2">
                    <p>
                        <?php
                            $timestamp = $chat['timestamp'];
                            $today = new DateTime("today"); // This object represents current date/time with time set to midnight
                            // var_dump($timestamp);
                            $match_date = DateTime::createFromFormat( "Y-m-d H:i:s", $timestamp );
                            $match_date->setTime( 0, 0, 0 ); // set time part to midnight, in order to prevent partial comparison

                            $diff = $today->diff( $match_date );
                            $diffDays = (integer)$diff->format( "%R%a" ); // Extract days count in interval

                            switch( $diffDays ) {
                                case 0:
                                    $date = $chat['timestamp'];
                                    $date = strtotime($date);
                                    echo date('H:i', $date);
                                    break;
                                case -1:
                                    echo "Yesterday";
                                    break;
                                default:
                                    $date = $chat['timestamp'];
                                    $date = strtotime($date);
                                    echo date('m/d', $date);
                            }
                        ?>
                    </p>
                    </div>
                </div>
                </form>
                <?php
            }
        }
        ?>
    </div>
    
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="../script/jquery-3.6.1.min.js"></script>
    <script>
        function chatwith(chat_id){
            // console.log('hai')
            $('.chat-'+chat_id).submit();
        }
    </script>
</body>
</html>
<?php
include 'api/connect.php';
// $stmt = $conn->prepare("SELECT * FROM chat");
// $stmt->execute();
// $row = $stmt->fetch();
// echo $row['chat_id'] . $row['user_id1'];
// $_POST
// $_GET
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// $stmt = $conn->prepare("SELECT * FROM chat where chat_id = ? and user_id1 = ?");
// $stmt->execute([2,12]);
// while($row = $stmt->fetch()){
//     echo $row['chat_id'] . $row['user_id1'] . '<br>';
// }
?>  
    <button class="ambilData" >Ambil data</button>
    <div class="hasil">

    </div>
    <form action="api/cobalagi.php">
        <input type="text" name="nama" id="nama">
        <textarea name="hai" id="hai" cols="30" rows="10"></textarea>
        <button type="submit">Submit</button>
    </form>
    <!-- Jquery -->
    <script src="script/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.ambilData').click(function(){
                console.log('hai')
                $.ajax({
                    type: "GET",
                    url: "api/ambilDataChat.php",
                    data: {
                        id : 2,
                    },
                    success: function (response) {
                        response = JSON.parse(response);
                        for (let index = 0; index < response.length; index++) {
                            $('.hasil').append('<p>'+response[index]['chat_id']+'</p>');
                        }
                        
                    }
                });
            })
        })
    </script>
</body>

</html>
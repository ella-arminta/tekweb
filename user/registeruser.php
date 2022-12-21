<?php
	require_once 'api/connect.php';
 
	if(ISSET($_POST['register'])){
		if($_POST['fullname'] != "" || $_POST['username'] != "" || $_POST['password'] != ""){
			try{
				$username = $_POST['username'];
				$fullname = $_POST['fullname'];
                $profilepic = $_POST['profilepic'];
				// md5 encrypted
				// $password = md5($_POST['password']);
				$password = $_POST['password'];
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `user` VALUES ('', '$username', '$fullname', '$password', '$profilepic')";
				$conn->exec($sql);
                
                $message = "Data Success Register!";
                echo "<script type='text/javascript'>alert('$message');window.location = 'login.php'</script>";
                // header('location:login.php');
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"User successfully created.","alert"=>"info");
			$conn = null;
		}else{
			echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'registeruser.php'</script>
			";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER USER</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
        .login-form {
            background-color: white;
            max-width: 700px;
            border: 5px solid red;
            border-radius: 8px;
            /* position: absolute;
            top: 53%;
            left: 50%;
            transform: translate(-50%, -50%); */
            width: 100%;
            display:block;
            margin:auto;
        }

        .login-form .title {
            padding: 15px 10px;
            text-align: center;
            text-shadow: 2px 2px 5px red;
            font-size: 40px;

        }

        .login-form .content {
            padding: 35px;
        }

        body {
            background-color: pink;
        }

        a:link {
            color: green;
            background-color: transparent;
            text-decoration: none;
        }

        a:visited {
            color: pink;
            background-color: transparent;
            text-decoration: none;
        }

        a:hover {
            color: red;
            background-color: transparent;
            text-decoration: underline;
        }

        a:active {
            color: yellow;
            background-color: transparent;
            text-decoration: underline;
        }

        img {
            width: 100px;
            height: 100px;
        }
    </style>
<body>
    <div class="login-form">

        <div class="title bg-warning text-white">
            <img src="logobb.PNG" class="rounded mx-auto" alt="Cinque Terre">
            <br>
            REGISTER
        </div>

        <div class="content">

            <?=isset($msg) ? '<div class="alert alert-danger">'.$msg.'</div>' : ''?>

            <form method="post" action="">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Fullname</label>
                    <input type="text" class="form-control" placeholder="Enter Fullname" id="exampleInputEmail1"
                        name="fullname" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="Enter Username" id="exampleInputEmail1"
                        name="username" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Password" id="exampleInputPassword1"
                        name="password" required>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain
                        spaces, special characters, or emoji.
                    </small>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Input Profile Picture</label>
                    <input class="form-control" type="file" id="profilepic" name="profilepic">
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-dark" name="register">Register</button>
                    <p>Already have account? Sign in <a href="login.php"> here</a></p>
                </div>
            </form>
        </div>
    </div>
    <?php
        if (isset($_GET['register'])){
            if ($_GET['register'] == 'failed'){
                echo '<Script>alert("Register Failed, Try again!")</script>';
            }
        }
    ?>
</body>

</html>
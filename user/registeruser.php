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

    <style>
    .login-form {
            background-color: white;
            max-width: 700px;
            border: 5px solid red;
            border-radius: 8px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
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
        body{
            background-color: pink;
        }
    </style>
</head>
<body>
    <div class="login-form">

    <div class="title bg-primary text-white">
        REGISTER
    </div>

    <div class="content">

        <?=isset($msg) ? '<div class="alert alert-danger">'.$msg.'</div>' : ''?>

            <form method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="Masukkan username" id="exampleInputEmail1" name="username">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Masukkan password" id="exampleInputPassword1" name="password">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Masukkan email" id="exampleInputPassword1" name="password">
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Input Profile Picture</label>
                    <input class="form-control" type="file" id="formFile">
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-dark" name="register">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
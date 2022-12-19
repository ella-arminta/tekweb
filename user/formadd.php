<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM ADD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.6.2.js"
        integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
        crossorigin="anonymous"></script>
    <style>
    .login-form {
            background-color: white;
            max-width: 700px;
            max-height: 1500px;
            border: 5px solid red;
            border-radius: 8px;
            position: absolute;
            top: 75%;
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
        img{
            width: 100px;
            height: 100px;
        }
        
    </style>
</head>
<body>
    <div class="login-form">
    <div class="title bg-primary text-white">
    <img src="logobb.PNG" class="rounded mx-auto" alt="Cinque Terre"> 
    
        FORM SELL ITEM
    </div>

    <div class="content">

        <?=isset($msg) ? '<div class="alert alert-danger">'.$msg.'</div>' : ''?>

            <form method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Product</label>
                    <input type="text" class="form-control" placeholder="Masukkan nama product" id="exampleInputEmail1" name="username">
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Input Picture Product</label>
                    <input class="form-control" type="file" id="formFile">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1">Keterangan Product</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="mb-3">
                <label for="validationTooltipUsername">Harga Product</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend">Rp</span>
                    </div>
                    <input type="number" min="10.00" step="500.00" value="10.00" id="exampleInputAmount" class="form-control" placeholder="Price">
                </div>
                </div>

                <div class="mb-3">
                <label for="validationTooltipUsername">Berat Product</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend">Centimeter(CM)</span>
                    </div>
                    <input type="number" min="1" step="5" value="1" id="exampleInputAmount" class="form-control" placeholder="Price">
                </div>
                </div>

                <div class="mb-3">
                <label for="validationTooltipUsername">Panjang Product</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend">Centimeter(CM)</span>
                    </div>
                    <input type="number" min="1" step="5" value="1" id="exampleInputAmount" class="form-control" placeholder="Price">
                </div>
                </div>

                <div class="mb-3">
                <label for="validationTooltipUsername">Lebar Product</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend">Centimeter(CM)</span>
                    </div>
                    <input type="number" min="1" step="5" value="1" id="exampleInputAmount" class="form-control" placeholder="Price">
                </div>
                </div>

                <div class="mb-3">
                <label for="validationTooltipUsername">Tinggi Product</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend">Gram</span>
                    </div>
                    <input type="number" min="1" step="5" value="1" id="exampleInputAmount" class="form-control" placeholder="Price">
                </div>
                </div>

                <div class="mb-3">
                <p>Kategori Product</p>
                    <select class="form-select" name="jenis_pengiriman">
                        <option value="0">Choose...</option>
                        <option value="1">Makanan</option>
                        <option value="2">Minuman</option>
                        <option value="3">Kebutuhan Rumah Tangga</option>
                        <option value="4">Mainan</option>
                        <option value="5">Peralatan Kantor</option>
                        <option value="6">Peralatan Sekolah</option>
                    </select>
                </div>


                <div class="d-grid gap-2">
                    <label class="form-check-label" for="autoSizingCheck">

                    <form class="was-validated">
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                        <label class="custom-control-label" for="customControlValidation1">Syarat dan Ketentuan berlaku</label>
                        <div class="invalid-feedback">Patuhi S&K!</div>
                    </div>
                    </form>

                    <button class="btn btn-dark" name="register">ADD Product</button>
                </div>
            </form>
        </div>
    </div>


</body>

</html>
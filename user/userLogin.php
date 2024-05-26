<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Girişi</title>
    <link rel="icon" href="../images/icon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            background-color: #F5F5E6;
        }
    </style>
</head>
<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <br><br>
                <a href="../index.php"><button type="button" class="btn btn-primary" style="text-align:left;">Ana Sayfaya Dön</button></a>
            </div>
            <div class="col-sm">
                <div style="text-align:center;"><a href="../index.php"><img src="../images/icon.png" width="200"></a></div>
            </div>
            <div class="col-sm">
                <br><br>
                <div style="text-align:right;">
                <a href="../admin/adminLogin.php"><button type="button" class="btn btn-primary" style="text-align:right;">Admin Girişi</button></a>
                </div>
            </div>
        </div>
        <br>
        <div class="jumbotron">
            <h3 style="text-align:center;" class="display-4">Üye Girişi</h3>
            <hr class="my-4">
            <!-- Form Kismi -->
            <form action="userCheck.php" method="POST">
                <label><b>Kullanıcı Adı:</b></label><input type="text" class="form-control" id="username" name="username">
                <br>
                <label><b>Şifre:</b></label><input type="password" class="form-control" id="password" name="password">
                <br>
                <input type="submit" class="btn btn-success">
            </form>
            <!-- Form Kismi -->
        </div>
    </div>
    <br>
</body>
</html>
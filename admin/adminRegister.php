<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kayıt</title>
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
        <!-- Ust Panel -->
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
                <a href="../user/userRegister.php"><button type="button" class="btn btn-primary" style="text-align:right;">Üye Kayıt</button></a>
                </div>
            </div>
        </div>
        <!-- Ust Panel -->
        <br>
        <div class="jumbotron">
            <h3 style="text-align:center;" class="display-4">Admin Kayıt</h3>
            <hr class="my-4">

            <!-- Form Kismi -->
            <form action="adminSigningUp.php" method="POST">
                <label><b>Kullanıcı Adı:</b></label>&nbsp<input type="text" class="form-control" id="username" name="username">
                <br>
                <label><b>TC No:</b></label>&nbsp<input type="text" class="form-control" id="tcno" name="tcno">
                <br>
                <label><b>E Mail:</b></label>&nbsp<input type="email" class="form-control" id="email" name="email">
                <br>
                <label><b>Ad:</b></label>&nbsp<input type="text" class="form-control" id="fname" name="fname">
                <br>
                <label><b>Soyad:</b></label>&nbsp<input type="text" class="form-control" id="lname" name="lname">
                <br>
                <label><b>Tel No:</b></label>&nbsp<input type="text" class="form-control" id="phone" name="phone">
                <br>
                <label><b>Doğum Günü:</b></label>&nbsp<input type="date" class="form-control" id="bday" name="bday">
                <br>
                <label><b>Şifre:</b></label>&nbsp<input type="password" class="form-control" id="password" name="password">
                <br>
                <input type="submit" class="btn btn-success">
            </form>
            <!-- Form Kismi -->
        </div>
        <br>
    </div>
</body>
</html>
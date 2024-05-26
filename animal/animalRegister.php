<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hayvan Kayıt</title>
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
                <?php
                session_start();
                /* $_SESSION["type"] admin mi user mi diye bakiyor ve profili ona gore gosteriyor. */
                if (!isset($_SESSION["type"])){
                    echo'
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
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="jumbotron">
                    <div class="alert alert-warning" role="alert">
                        <h3 style="text-align:center;" class="display-4">Lütfen önce giriş yapın!</h3>
                    </div></div>';
                }
                if ($_SESSION["type"] == "admin"){
                    echo'
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
                                <a href="../admin/adminPage.php"><button type="button" class="btn btn-primary" style="text-align:right;">Admin İşlemleri</button></a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="jumbotron">
                        <h3 style="text-align:center;" class="display-4">Hayvan Kayıt</h3>
                        <hr class="my-4">
                        <form action="animalSigningUp.php" method="POST">
                            <label><b>Hayvanın Adı:</b></label>&nbsp<input type="text" class="form-control" id="name" name="name">
                            <br>
                            <label><b>Hayvanın Türü:</b></label>&nbsp<input type="text" class="form-control" id="species" name="species">
                            <br>
                            <label><b>Hayvanın Cinsiyeti:</b></label>&nbsp<input type="text" class="form-control" id="gender" name="gender">
                            <br>
                            <label><b>Hayvanın Doğum Tarihi:</b></label>&nbsp<input type="date" class="form-control" id="bday" name="bday">
                            <br>
                            <label><b>Hayvanın Yaşam Alanı:</b></label>&nbsp<input type="text" class="form-control" id="habitat" name="habitat">
                            <br>
                            <label><b>Hayvanın Sağlık Durumu:</b></label>&nbsp<input type="text" class="form-control" id="hs" name="hs">
                            <br>
                            <label><b>Hayvanın Beslenme Tipi:</b></label>&nbsp<input type="text" class="form-control" id="ntype" name="ntype">
                            <br>
                            <label><b>Hayvanın Bir Öğünde Ne Kadar Yemekle Beslendiği:</b></label>&nbsp<input type="text" class="form-control" id="nquantity" name="nquantity">
                            <br>
                            <label><b>Hayvanın Günlük Beslenme Sayısı :</b></label>&nbsp<input type="text" class="form-control" id="ntimes" name="ntimes">
                            <br>
                            <input type="submit" class="btn btn-success">
                        </form>
                    </div>
                    <br>
                    ';
                }
                else if ($_SESSION["type"] == "user"){
                    echo'
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
                                <a href="../user/userPage.php"><button type="button" class="btn btn-primary" style="text-align:right;">Üye İşlemleri</button></a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="jumbotron">
                        <h3 style="text-align:center;" class="display-4">Hayvan Kayıt</h3>
                        <hr class="my-4">
                        <form action="animalSigningUp.php" method="POST">
                            <label><b>Hayvanın Adı:</b></label>&nbsp<input type="text" class="form-control" id="name" name="name">
                            <br>
                            <label><b>Hayvanın Türü:</b></label>&nbsp<input type="text" class="form-control" id="species" name="species">
                            <br>
                            <label><b>Hayvanın Cinsiyeti:</b></label>&nbsp<input type="text" class="form-control" id="gender" name="gender">
                            <br>
                            <label><b>Hayvanın Doğum Tarihi:</b></label>&nbsp<input type="date" class="form-control" id="bday" name="bday">
                            <br>
                            <label><b>Hayvanın Yaşam Alanı:</b></label>&nbsp<input type="text" class="form-control" id="habitat" name="habitat">
                            <br>
                            <label><b>Hayvanın Sağlık Durumu:</b></label>&nbsp<input type="text" class="form-control" id="hs" name="hs">
                            <br>
                            <label><b>Hayvanın Beslenme Tipi:</b></label>&nbsp<input type="text" class="form-control" id="ntype" name="ntype">
                            <br>
                            <label><b>Hayvanın Bir Öğünde Ne Kadar Yemekle Beslendiği:</b></label>&nbsp<input type="text" class="form-control" id="nquantity" name="nquantity">
                            <br>
                            <label><b>Hayvanın Günlük Beslenme Sayısı :</b></label>&nbsp<input type="text" class="form-control" id="ntimes" name="ntimes">
                            <br>
                            <input type="submit" class="btn btn-success">
                        </form>
                    </div>
                    <br>
                    ';
                }
                ?>
    </div>
    <br>
</body>
</html>
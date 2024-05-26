<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Sayfası</title>
    <link rel="icon" href="../images/icon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body{
            background-color: #F5F5E6;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        /* eger $_SESSION["type"] yoksa veya admin ise bu sayfaya erismesini engelledim ve index.php sayfasina yonlendirdim */  
        if (!isset($_SESSION["type"])){
            header("Location: ../index.php");
            exit();
        }
        else if ($_SESSION["type"] == "admin"){
            header("Location: ../index.php");
            exit();
        }
    ?>
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
                <div style="text-align:right;">
                <br>
                    <a href="../other/profile.php"><img src="../images/profile.png" width="52"></a>
                </div>
            </div>
        </div>
        <br>
        <div class="jumbotron">
            <h3 style="text-align:center;" class="display-4">Üye İşlemleri</h3>
            <hr class="my-4">
            <form style="text-align:center;" action="userCheck.php" method="POST">
                <a href="../animal/showAnimals.php"><button type="button" class="btn btn-primary">Kayıtlı Hayvanları Görüntüle</button></a>
                <a href="../animal/animalRegister.php"><button type="button" class="btn btn-primary">Veritabanına Hayvan Kaydet</button></a>
            </form>
        </div>
    </div>
    <br>
</body>
</html>
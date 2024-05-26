<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Çıkış Yapıldı</title>
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
    <div class="container">
        <?php
            session_start();
            /* sessionlar yoksa bu sayfaya girmesini engelleyip index.php sayfasina gonderdim */ 
            if ((!isset($_SESSION["type"])) || (!isset($_SESSION["username"]))){
                header("Location: ../index.php");
            }
            else {
                /* sessionlari temizledim bu sayede cikis islemini sagladim */
                unset($_SESSION["username"]);
                unset($_SESSION["type"]);
                session_regenerate_id();
                echo'<br><div class="row">
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
                    </div> <br><hr>
                    <div class="alert alert-success" role="alert">
                    <h2 style="text-align:center;">Başarıyla Çıkış Yapıldı</h2>
                    </div>';
            }
        ?>
    </div>
    <br>
</body>
</html>
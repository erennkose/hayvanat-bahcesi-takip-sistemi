<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrol Ediliyor...</title>
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
    <br><div class="row">
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
                        <a href="userLogin.php"><button type="button" class="btn btn-primary" style="text-align:right;">Üye Girişi</button></a>
                        </div>
                    </div>
                    </div>
        <?php
            $servername = "localhost";
            $adminUsername = "root";
            $adminPassword = "";
            $dbname = "zoo";

            $conn = new mysqli($servername, $adminUsername, $adminPassword, $dbname);

            if ($conn->connect_error) {
                die("Database Bağlantı Hatası!". $conn->connect_error);
            }

            if ($_POST == null){ // Formdan bilgi alamadiysak indexe geri dondurdum
                header("Location: ../index.php");
                exit();
            }

            $username = $_POST['username'];
            $password = $_POST['password'];

            if($username == null || $password == null) { 
                echo '<br><div class="alert alert-warning" role="alert">
                <h1 style="text-align:center;">Lütfen alanları boş bırakmayın!</h1>
                </div>';
                exit();
            }

            /* sql komutu vererek database islemlerini yaptim */
            $sqlQueryUsername = $conn -> query("SELECT * FROM users WHERE User_Name = '$username' ");

            /* databaseden alinan bilgileri kullanmak icin degerleri bir dizide tuttum */
            $infoArray = $sqlQueryUsername -> fetch_array(MYSQLI_ASSOC);

            if(($infoArray != null) && (password_verify($password, $infoArray["Password"]))) {
                session_start();
                $_SESSION["username"] = $infoArray["User_Name"];
                $_SESSION["type"] = "user";
                header("Location: ../index.php");
            }
            else {
                echo '
                <br><div class="alert alert-danger" role="alert">
                <h2 style="text-align:center;">Hatalı şifre veya kullanıcı adı...</h2>
                </div>';
            }
            $conn->close();
        ?>
    </div>
    <br>
</body>
</html>
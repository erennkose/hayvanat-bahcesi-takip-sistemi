<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hayvanlar</title>
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
                <?php
                    session_start();
                    if (!isset($_SESSION["type"])){
                        header("Location: ../index.php");
                    }
                    else if ($_SESSION["type"] == "admin"){
                        echo'<a href="../admin/adminPage.php"><button type="button" class="btn btn-primary" style="text-align:right;">Admin İşlemleri</button></a>';
                    }
                    else if ($_SESSION["type"] == "user"){
                        echo'<a href="../user/userPage.php"><button type="button" class="btn btn-primary" style="text-align:right;">Üye İşlemleri</button></a>';
                    }
                ?>
                </div>
            </div>
        </div>
        <br><hr>
        <?php
        $servername = "localhost";
        $adminUsername = "root";
        $adminPassword = "";
        $dbname = "zoo";

        /* database baglantisini baslattim */
        $conn = new mysqli($servername, $adminUsername, $adminPassword, $dbname);

        if ($conn->connect_error) {
            die("Database Bağlantı Hatası!" . $conn->connect_error);
        }

        /* gelen idye gore databaseden hayvani sildim */
        if (isset($_GET['id'])) {
            $animal_id = $_GET['id'];
            $sql = "DELETE FROM animals WHERE Animal_ID = $animal_id";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">
                    <h2 style="text-align:center;" class="alert-heading">Kayıt Başarıyla Silindi!</h2>
                    </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                    <h2 style="text-align:center;" class="alert-heading">Kayıt Silinemedi!</h2>
                    </div>';
            }
        }

        $conn->close();
        ?>
    </div>
    <br>
</body>
</html>

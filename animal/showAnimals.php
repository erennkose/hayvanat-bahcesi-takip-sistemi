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
                    /* $_SESSION["type"] yoksa bu sayfa gorulmemeli bu yuzden index.php sayfasina yonlendirdim */
                    if (!isset($_SESSION["type"])){
                        header("Location: ../index.php");
                    }
                    /* $_SESSION["type"] admin mi user mi diye bakiyor ve ona bagli olarak butonu degistiriyor */
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
        <br>
    <?php
        $servername = "localhost";
        $adminUsername = "root";
        $adminPassword = "";
        $dbname = "zoo";

        /* database baglantisini baslattim */
        $conn = new mysqli($servername, $adminUsername, $adminPassword, $dbname);

        if ($conn->connect_error) {
            die("Database Bağlantı Hatası!". $conn->connect_error);
        }

        /* sql komutlarini yaptim */
        $sqlQuery = $conn->query("SELECT * FROM animals");

        echo'
        <table border=1 class="table table-hover">
        <thead>
        <tr>
        <th>Hayvan ID</th><th>Hayvanın Adı</th>
        <th>Türü</th><th>Cinsiyeti</th>
        <th>Doğum Günü</th><th>Yaşam Alanı</th>
        <th>Sağlık Durumu</th><th>Beslenme Tipi</th>
        <th>Bir Öğünde Ne Kadar Yediği</th><th>Günde Yediği Öğün Sayısı</th>
        <th>Düzenle</th><th>Sil</th></tr></thead>
        ';

        /* tum hayvanlari ekrana yazdirmak icin bir while dongusu kullandim */
        while ($infoArray = $sqlQuery->fetch_array(MYSQLI_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $infoArray['Animal_ID'] . '</td>';
            echo '<td>' . $infoArray['Name'] . '</td>';
            echo '<td>' . $infoArray['Species'] . '</td>';
            echo '<td>' . $infoArray['Gender'] . '</td>';
            echo '<td>' . $infoArray['Birth_Date'] . '</td>';
            echo '<td>' . $infoArray['Habitat'] . '</td>';
            echo '<td>' . $infoArray['Health_Status'] . '</td>';
            echo '<td>' . $infoArray['Nutrition_Type'] . '</td>';
            echo '<td>' . $infoArray['Nutrition_Quantity'] . '</td>';
            echo '<td>' . $infoArray['Nutrition_Times'] . '</td>';
            echo '<td><a href="editAnimal.php?id=' . $infoArray['Animal_ID'] . '"><button type="button" class="btn btn-warning">Düzenle</button></a></td>';
            echo '<td><a href="deleteAnimal.php?id=' . $infoArray['Animal_ID'] . '"><button type="button" class="btn btn-danger">Sil</button></a></td>';
            echo '</tr>';
        }
        echo '</table>';
        $conn->close();
    ?>
    </div>
    <br>
</body>
</html>

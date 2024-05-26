<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üyeler</title>
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
                        header("Location: ../index.php");
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
        /* sql komutu */
        $sqlQuery = $conn->query("SELECT * FROM users");

        echo'
        <table border=1 class="table table-hover">
        <thead>
        <tr>
        <th> Kullanıcı ID</th><th>Kullanıcı Adı</th>
        <th>TC No</th><th>E Mail</th>
        <th>Ad</th><th>Soyad</th>
        <th>Telefon Numarası</th><th>Doğum Tarihi</th>
        <th>Düzenle</th><th>Sil</th></tr></thead>
        ';

        /* tum kullanicilari ekrana yazdirmak icin bir while dongusu kullandim */
        while ($infoArray = $sqlQuery->fetch_array(MYSQLI_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $infoArray['User_ID'] . '</td>';
            echo '<td>' . $infoArray['User_Name'] . '</td>';
            echo '<td>' . $infoArray['Tc_No'] . '</td>';
            echo '<td>' . $infoArray['E_Mail'] . '</td>';
            echo '<td>' . $infoArray['First_Name'] . '</td>';
            echo '<td>' . $infoArray['Last_Name'] . '</td>';
            echo '<td>' . $infoArray['GSM_No'] . '</td>';
            echo '<td>' . $infoArray['Birth_Date'] . '</td>';
            echo '<td><a href="editUser.php?id=' . $infoArray['User_ID'] . '"><button type="button" class="btn btn-warning">Düzenle</button></a></td>';
            echo '<td><a href="deleteUser.php?id=' . $infoArray['User_ID'] . '"><button type="button" class="btn btn-danger">Sil</button></a></td>';
            echo '</tr>';
        }
        echo '</table>';
        $conn->close();
    ?>
    <br>
</body>
</html>
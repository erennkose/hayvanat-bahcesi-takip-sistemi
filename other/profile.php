<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
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
        
        <?php
            session_start();
            /* $_SESSION["type"] admin mi user mi diye bakiyor ve profili ona gore gosteriyor. */
            if (!isset($_SESSION["type"])){
                echo '<div class="row">
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
                    <a href="../user/userLogin.php"><button type="button" class="btn btn-primary" style="text-align:right;">Üye Girişi</button></a>
                    </div>
                </div>
                </div><br><hr><div class="alert alert-warning" role="alert">
                    <h3 style="text-align:center;" class="display-4">Lütfen önce giriş yapın!</h3>
                </div>';
            }
            else if ($_SESSION["type"] == "admin") {
                $servername = "localhost";
                $adminUsername = "root";
                $adminPassword = "";
                $dbname = "zoo";

                /* database baglantisini baslattim */
                $conn = new mysqli($servername, $adminUsername, $adminPassword, $dbname);

                if ($conn->connect_error) {
                    die("Database Bağlantı Hatası!". $conn->connect_error);
                }
                $temp = $_SESSION['username'];
                $sqlQueryUsername = $conn->query("SELECT * FROM admins WHERE User_Name = '$temp' ");
                $infoArray = $sqlQueryUsername->fetch_array(MYSQLI_ASSOC);
                echo'<div class="row">
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
                        <a href="../other/logOut.php"><button type="button" class="btn btn-danger" style="text-align:right;">Çıkış Yap</button></a>
                        </div>
                    </div>
                </div>
                <br><hr>
                    <div style="text-align:center;" ><h1 class="display-4">Admin Bilgileri</h1>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Kullanıcı Adı: </b>' . $infoArray['User_Name'] . '</li>
                        <li class="list-group-item"><b>TC No: </b>' . $infoArray['Tc_No'] . '</li>
                        <li class="list-group-item"><b>E-Mail: </b>' . $infoArray['E_Mail'] . '</li>
                        <li class="list-group-item"><b>Ad: </b>' . $infoArray['First_Name'] . '</li>
                        <li class="list-group-item"><b>Soyad: </b>' . $infoArray['Last_Name'] . '</li>
                        <li class="list-group-item"><b>Telefon Numarası: </b>' . $infoArray['GSM_No'] . '</li>
                        <li class="list-group-item"><b>Doğum Tarihi: </b>' . $infoArray['Birth_Date'] . '</li>
                    </ul>
                    </div><br>
                    <div style="text-align:center;"><a href="../admin/deleteAdmin.php?id=' . $infoArray['Admin_ID'] . '"><button class="btn btn-danger">Hesabı Sil</button></a></div>';
            }
            else if ($_SESSION["type"] == "user") {
                $servername = "localhost";
                $adminUsername = "root";
                $adminPassword = "";
                $dbname = "zoo";

                /* database baglantisini baslattim */
                $conn = new mysqli($servername, $adminUsername, $adminPassword, $dbname);

                if ($conn->connect_error) {
                    die("Database Bağlantı Hatası!". $conn->connect_error);
                }
                $temp = $_SESSION['username'];
                $sqlQueryUsername = $conn->query("SELECT * FROM users WHERE User_Name = '$temp' ");
                $infoArray = $sqlQueryUsername->fetch_array(MYSQLI_ASSOC);
                echo'<div class="row">
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
                        <a href="../other/logOut.php"><button type="button" class="btn btn-danger" style="text-align:right;">Çıkış Yap</button></a>
                        </div>
                    </div>
                </div>
                <br><hr>
                    <div style="text-align:center;"><h1 class="display-4">Üye Bilgileri</h1>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Kullanıcı Adı: </b>' . $infoArray['User_Name'] . '</li>
                        <li class="list-group-item"><b>TC No: </b>' . $infoArray['Tc_No'] . '</li>
                        <li class="list-group-item"><b>E-Mail: </b>' . $infoArray['E_Mail'] . '</li>
                        <li class="list-group-item"><b>Ad: </b>' . $infoArray['First_Name'] . '</li>
                        <li class="list-group-item"><b>Soyad: </b>' . $infoArray['Last_Name'] . '</li>
                        <li class="list-group-item"><b>Telefon Numarası: </b>' . $infoArray['GSM_No'] . '</li>
                        <li class="list-group-item"><b>Doğum Tarihi: </b>' . $infoArray['Birth_Date'] . '</li>
                    </ul></div>';
            }
        ?>
    </div>
    <br>
</body>
</html>
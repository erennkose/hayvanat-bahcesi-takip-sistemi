<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt İşlemleri</title>
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
                <a href="adminLogin.php"><button type="button" class="btn btn-primary" style="text-align:right;">Admin Girişi</button></a>
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

        if ($_POST == null){ // Formdan bilgi alamadiysak indexe geri dondurdum
            header("Location: ../index.php");
            exit();
        }

        $username = $_POST['username'];
        $tcno = $_POST['tcno'];
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $bday = $_POST['bday'];
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); //sifreyi hashleyerek databasede tuttum

        /* eger girilen bilgilerde null varsa uyarı dondurdum */
        if($username == null || $tcno == null || $email == null || $fname == null || $lname == null || $phone == null || $bday == null || $password == null) {
            echo '
            <div class="alert alert-warning" role="alert">
            <h1 style="text-align:center;">Lütfen alanların hepsini doldurun!</h1>
            </div>';
        }
        else {
            // eslesen kayitlari kontrol et
            $checkQuery = "SELECT * FROM admins WHERE User_Name='$username' OR Tc_No='$tcno' OR E_Mail='$email' OR GSM_No='$phone'";
            $result = $conn->query($checkQuery);

            if ($result->num_rows > 0) {
                echo '
                <div class="alert alert-danger" role="alert">
                <h2 style="text-align:center;">Bu kullanıcı adı, TC no, email veya telefon numarası zaten kullanılıyor.</h2>
                </div>';
            } else {
                // sql komutu vererek database islemlerini yaptim
                $sqlQuery = "INSERT INTO admins(User_Name, Tc_No, E_Mail, First_Name, Last_Name, GSM_No, Birth_Date, Password)
                             VALUES('$username', '$tcno', '$email', '$fname', '$lname', '$phone', '$bday', '$hashedPassword')";
                if ($conn->query($sqlQuery)) {
                    echo '<hr>
                    <div class="alert alert-success" role="alert">
                    <h2 style="text-align:center;">Kaydınız Oluşturuldu.</h2>
                    </div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                        <h2 style="text-align:center;">Kayıt OLUŞTURULAMADI.</h2>
                        </div>';
                }
            }
        }
        $conn->close();
    ?>
    <br>
</body>
</html>

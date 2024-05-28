<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Düzenle</title>
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
<body><br>
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
        <?php
            $updated = false;
            $servername = "localhost";
            $adminUsername = "root";
            $adminPassword = "";
            $dbname = "zoo";

            /* database baglantisini baslattim */
            $conn = new mysqli($servername, $adminUsername, $adminPassword, $dbname);

            if ($conn->connect_error) {
                die("Database Bağlantı Hatası! " . $conn->connect_error);
            }

            /* user id'si ile mevcut verileri çekme */
            if (isset($_GET['id'])) {
                $user_id = $_GET['id'];
                $sql = "SELECT * FROM users WHERE User_ID = $user_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $infoArray = $result->fetch_assoc();
                } else {
                    echo '<br><div class="alert alert-danger" role="alert">
                        <h2 style="text-align:center;">Üye Bulunamadı.</h2>
                        </div>';
                    exit();
                }
            } else {
                header("Location: ../index.php");
                exit();
            }

            /* form gönderildiğinde veritabanını güncelleme */
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username'];
                $tcno = $_POST['tcno'];
                $email = $_POST['email'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $phone = $_POST['phone'];
                $bday = $_POST['bday'];

                $updateSql = "UPDATE users SET 
                                User_Name='$username', 
                                Tc_No='$tcno', 
                                E_Mail='$email', 
                                First_Name='$fname', 
                                Last_Name='$lname', 
                                GSM_No='$phone', 
                                Birth_Date='$bday'
                            WHERE User_ID=$user_id";

                if ($conn->query($updateSql) === TRUE) {
                    $updated = true;
                    echo '<br><div class="alert alert-success" role="alert">
                        <h2 style="text-align:center;">Güncelleme Başarıyla Tamamlandı.</h2>
                        </div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                    <h2 style="text-align:center;" class="alert-heading">Güncelleme Yapılamadı!</h2>
                    </div>';
                }
            }

            /* guncelleme yapilmadiysa duzenleme secenekleri cikmasini bir degiskenle kontrol ettim */
            if ($updated == false){
                echo'<br><hr>
            <h2 style="text-align:center;" class="display-4">Üye Düzenle</h2><br>
            <div class="jumbotron">
                <form  action="" method="POST">
                    <label><b>Üye Kullanıcı Adı:</b></label>&nbsp<input type="text" class="form-control" id="username" name="username" value="' . $infoArray['User_Name'] .'" required>
                    <br><br>
                    <label><b>Üye TC No:</b></label>&nbsp<input type="text" class="form-control" id="tcno" name="tcno" maxlength="11" value="' . $infoArray['Tc_No'] . '" required>
                    <br><br>
                    <label><b>Üye E-Mail:</b></label>&nbsp<input type="text" class="form-control" id="email" name="email" value="' . $infoArray['E_Mail'] . '" required>
                    <br><br>
                    <label><b>Üye Ad:</b></label>&nbsp<input type="text" class="form-control" id="fname" name="fname" value=' . $infoArray['First_Name'] . ' required>
                    <br><br>
                    <label><b>Üye Soyad:</b></label>&nbsp<input type="text" class="form-control" id="lname" name="lname" value="' . $infoArray['Last_Name'] . '" required>
                    <br><br>
                    <label><b>Üye Telefon Numarası:</b></label>&nbsp<input type="text" class="form-control" id="phone" name="phone" maxlength="10" value="' . $infoArray['GSM_No'] . '" required>
                    <br><br>
                    <label><b>Üye Doğum Tarihi:</b></label>&nbsp<input type="date" class="form-control" id="bday" name="bday" value="' . $infoArray['Birth_Date'] . '" required>
                    <br><br>
                    <button style="text-align:center;" type="submit" class="btn btn-success">Güncelle</button>
                </form>
            </div>
            <br>';
            }
            $conn->close();
            ?> 
    </div>
    <br>
</body>
</html>

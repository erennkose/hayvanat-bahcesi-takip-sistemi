<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hayvan Düzenle</title>
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
                        echo'<a href="../user/userPage.php"><button type="button" class="btn btn-primary" style="text-align:right;">Üye İşlemleri</button></a>';
                    }
                ?>
                </div>
            </div>
        </div>
        <?php
            $servername = "localhost";
            $adminUsername = "root";
            $adminPassword = "";
            $dbname = "zoo";
            $updated = false;

            /* database baglantisini baslattim */
            $conn = new mysqli($servername, $adminUsername, $adminPassword, $dbname);

            if ($conn->connect_error) {
                die("Database Bağlantı Hatası! " . $conn->connect_error);
            }

            /* hayvan id'si ile mevcut verileri çekme */
            if (isset($_GET['id'])) {
                $animal_id = $_GET['id'];
                $sql = "SELECT * FROM animals WHERE Animal_ID = $animal_id";
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
                $name = $_POST['name'];
                $species = $_POST['species'];
                $gender = $_POST['gender'];
                $birth_date = $_POST['birth_date'];
                $habitat = $_POST['habitat'];
                $health_status = $_POST['hs'];
                $nutrition_type = $_POST['ntype'];
                $nutrition_quantity = $_POST['nquantity'];
                $nutrition_times = $_POST['ntimes'];

                /* sql komutlarini burada yaptim */ 
                $updateSql = "UPDATE animals SET 
                                Name='$name', 
                                Species='$species', 
                                Gender='$gender', 
                                Birth_Date='$birth_date', 
                                Habitat='$habitat', 
                                Health_Status='$health_status', 
                                Nutrition_Type='$nutrition_type', 
                                Nutrition_Quantity='$nutrition_quantity', 
                                Nutrition_Times='$nutrition_times' 
                            WHERE Animal_ID=$animal_id";

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
            <h2 style="text-align:center;" class="display-4">Hayvan Düzenle</h2><br>
            <div class="jumbotron">
                <form  action="" method="POST">
                    <label><b>Hayvanın Adı:</b></label>&nbsp<input type="text" class="form-control" id="name" name="name" value="' . $infoArray['Name'] .'" required>
                    <br><br>
                    <label><b>Hayvanın Türü:</b></label>&nbsp<input type="text" class="form-control" id="species" name="species" value="' . $infoArray['Species'] . '" required>
                    <br><br>
                    <label><b>Hayvanın Cinsiyeti:</b></label>&nbsp<input type="text" class="form-control" id="gender" name="gender" value="' . $infoArray['Gender'] . '" required>
                    <br><br>
                    <label><b>Hayvanın Doğum Tarihi:</b></label>&nbsp<input type="date" class="form-control" id="birth_date" name="birth_date" value=' . $infoArray['Birth_Date'] . ' required>
                    <br><br>
                    <label><b>Hayvanın Yaşam Alanı:</b></label>&nbsp<input type="text" class="form-control" id="habitat" name="habitat" value="' . $infoArray['Habitat'] . '" required>
                    <br><br>
                    <label><b>Hayvanın Sağlık Durumu:</b></label>&nbsp<input type="text" class="form-control" id="hs" name="hs" value="' . $infoArray['Health_Status'] . '" required>
                    <br><br>
                    <label><b>Hayvanın Beslenme Tipi:</b></label>&nbsp<input type="text" class="form-control" id="ntype" name="ntype" value="' . $infoArray['Nutrition_Type'] . '" required>
                    <br><br>
                    <label><b>Hayvanın Bir Öğünde Ne Kadar Yemekle Beslendiği:</b><input type="text" class="form-control" id="nquantity" name="nquantity" value="' . $infoArray['Nutrition_Quantity'] . '" required>
                    <br><br>
                    <label><b>Hayvanın Günlük Beslenme Sayısı :</b></label>&nbsp<input type="text" class="form-control" id="ntimes" name="ntimes" value="' . $infoArray['Nutrition_Times'] . '" required>
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

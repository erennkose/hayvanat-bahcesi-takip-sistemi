<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hayvanat Bahçesi Hayvan Takip Sistemi</title>
    <link rel="icon" href="images/icon.png" type="image/png">
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
    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <br><br>
                <?php
                    session_start();
                    /* $_SESSION["type"] sayesinde giris yapan kisinin admin mi user mi oldugunu anlayabiliyoruz */
                    if (!isset($_SESSION["type"])) {
                        echo' 
                        <a href="admin/adminLogin.php"><button type="button" class="btn btn-primary btn-sm" style="text-align:left;">Admin Girişi</button></a>
                        <a href="user/userLogin.php"><button type="button" class="btn btn-primary btn-sm" style="text-align:left;">Üye Girişi</button></a>
                        <a href="admin/adminRegister.php"><button type="button" class="btn btn-primary btn-sm" style="text-align:left;">Admin Kayıt</button></a>
                        <a href="user/userRegister.php"><button type="button" class="btn btn-primary btn-sm" style="text-align:left;">Üye Kayıt</button></a>
                        ';
                    }
                    else if ($_SESSION["type"] == "admin"){
                        echo'
                        <p>Merhaba, '. $_SESSION["username"] .' </p>
                        <a href="admin/adminPage.php"><button type="button" class="btn btn-primary btn-sm" style="text-align:left;">Admin İşlemleri</button></a>
                        <a href="other/logOut.php"><button type="button" class="btn btn-danger btn-sm" style="text-align:left;">Çıkış Yap</button></a>
                        ';
                    }
                    else if ($_SESSION["type"] == "user"){
                        echo'
                        <p>Merhaba, '. $_SESSION["username"] .'</p>
                        <a href="user/userPage.php"><button type="button" class="btn btn-primary btn-sm" style="text-align:left;">Üye İşlemleri</button></a>
                        <a href="other/logOut.php"><button type="button" class="btn btn-danger btn-sm" style="text-align:left;">Çıkış Yap</button></a>
                        ';
                    }
                ?>
            </div>
            <div class="col-sm">
                <div style="text-align:center;"><a href="index.php"><img src="images/icon.png" width="200"></a></div>
            </div>
            <div class="col-sm">
                <br>
                <div style="text-align:right;">
                    <a href="other/profile.php"><img src="images/profile.png" width="52"></a>
                </div>
            </div>
        </div>
        <br><br>
        <div class="jumbotron">
            <h3 class="display-4">Hayvanat Bahçesi Hayvan Takip Sistemi</h3>
            <p class="lead">Bir hayvanat bahçesindeki hayvanların sağlık durumlarını, beslenme
            alışkanlıklarını, yaşam alanlarını ve diğer verilerini izlemek, kaydetmek ve analiz 
            etmek için kullanılabilecek bir sistem.</p>
            <hr class="my-4">
            <p>Altta bulunan butonu kullanarak bizimle mail yoluyla iletişime geçebilirsiniz. </p>
            <a class="btn btn-primary btn-lg" href="mailto:erenkosee471@gmail.com" role="button">Bize Ulaşın</a>
        </div>
    </div> 
    <!-- Container -->

    <!-- Carousel -->
    <br>
    <div style=" display:flex; text-align:center; justify-content:center; align-items:center;">
        <div id="carouselExampleControls" style="width:50%; border:10px solid black" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="images/carousel0.jpeg" width="30" class="d-block w-100" alt="First">
                </div>
                <div class="carousel-item">
                <img src="images/carousel1.jpeg" width="30" class="d-block w-100" alt="Second">
                </div>
                <div class="carousel-item">
                <img src="images/carousel2.jpeg" width="30" class="d-block w-100" alt="Third">
                </div>
                <div class="carousel-item">
                <img src="images/carousel4.jpeg" width="30" class="d-block w-100" alt="Fourth">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Geri</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                <span class="sr-only">İleri</span>
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
    <!-- Carousel -->

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
        <div class="container py-4 text-center">
            <div class="row">
                <div class="col-md-12 d-flex flex-column align-items-center">
                    <h5>Bu Sitenin Kaynak Kodlarına Alttaki GitHub Logosundan Ulaşabilirsiniz</h5>
                    <ul class="list-unstyled d-flex justify-content-center">
                        <li class="mx-2"><a href="https://github.com/erennkose/hayvanat-bahcesi-takip-sistemi" class="text-white"><img src="images/github.png"> </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-secondary text-center py-2">
            <p class="mb-0">© 2024 Tüm Hakları Saklıdır</p>
        </div>
    </footer>
    <!-- Footer -->
</body>
</html>
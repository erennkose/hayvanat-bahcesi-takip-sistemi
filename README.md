# Hayvanat Bahçesi Hayvan Takip Sistemi İnternet Sitesi
## Site Açıklaması
Bir hayvanat bahçesindeki hayvanların sağlık durumlarını, beslenme
alışkanlıklarını, yaşam alanlarını ve diğer verilerini izlemek, kaydetmek ve analiz etmek için kullanılabilecek
bir sistem.
> NOT: Bu web sitesi Bootstrap front-end kütüphanesi kullanılarak yazılmıştır. 
## Site Kullanış Videosu Linki
* [Kullanış Videosu Linki](https://youtu.be/qEXkgVCYsDw) - Sitenin kullanış videosuna yandaki linke tıklayarak ulaşabilirsiniz.
## Sitenin XAMPP İle Kullanılışı
* Öncelikle XAMPP uygulamasından Apache ve MySQL Database serverlarını başlatıyoruz.
* Tarayıcımızın adres çubuğuna localhost/phpmyadmin yazarak SQL komutlarımızı yazacağımız siteye ulaşıyoruz.
* Sitenin üst kısmındaki seçeneklerden SQL yazan kısma tıklayıp, GitHub'dan indirdiğiniz klasörün alt dizininde bulunan database klasörü içindeki database.sql dosyasında bulunan kodları buraya yapıştırıyoruz ve sağ alttan Git butonuna tıklayarak veritabanımızı ve tablolarımızı oluşturuyoruz.
 > NOT: SQL kodunu girerken oluşturulacak olan database ile aynı ada sahip halihazırda bir database olmamasına dikkat edin. Aksi taktirde site istendiği gibi çalışmayabilir.  
* Ardından GitHub'dan indirdiğimiz kaynak kodlarını, içi boşaltılmış olan xampp/htdocs klasörüne atıyoruz.
* Sonrasında ise tarayıcımızın adres çubuğuna localhost/hayvanat-bahcesi-takip-sistemi-main yazıp siteye ulaşıyoruz.
* Sitemi artık istediğiniz gibi kullanabilirsiniz.

## Kullandığım Web Siteleri
* [seeklogo](https://seeklogo.com/free-vector-logos/zoo) - Iconu ve logoyu aldığım web sitesi.
* [FlatIcon](https://www.flaticon.com/free-icon/profile_6522516) - Profil logosunu aldığım web sitesi.
* [icons8](https://icons8.com/icons/set/github--white) - GitHub logosunu aldığım web sitesi.
* [Freepik](https://www.seattleandsound.com/woodland-park-zoo/) - Carousel fotoğraflarını aldığım web sitesi.
* [Bootstrap](https://getbootstrap.com/docs/4.6/getting-started/introduction/) - Front-End site tasarımı için kullandığım kütüphane.
## Yapılabilen İşlemler
### Admin
* Sisteme kayıt olma
* Şifreli giriş ve oturum
* Kayıtlı üyeleri görüntüleme, düzenleme, silme
* Kayıtlı hayvanları görüntüleme, düzenleme, silme
* Veritabanına hayvan kaydetme
* Kendi hesap bilgilerini görüntüleme, hesabı silme
### Üye
* Sisteme kayıt olma
* Şifreli giriş ve oturum
* Kayıtlı hayvanları görüntüleme, düzenleme, silme
* Veritabanına hayvan kaydetme
## Web Sitemden Görseller
* ### Giriş Ekranı
  ![](readmeImages/index.png)
* ### Admin Ekranı
  ![](readmeImages/adminPage.png)
* ### Üye Ekranı
  ![](readmeImages/userPage.png)
* ### Kayıtlı Hayvanları Görüntüleme
  ![](readmeImages/showAnimals.png)
* ### Kayıtlı Üyeleri Görüntüleme
  ![](readmeImages/showUsers.png)
## Yazar
* [Eren Köse](https://tr.linkedin.com/in/eren-k%C3%B6se-338936252?trk=people-guest_people_search-card) - Bursa Teknik Üniversitesi Bilgisayar Mühendisliği Öğrencisi

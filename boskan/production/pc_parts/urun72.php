<?php 
  require "page_layouts/topbar.php";
  require "page_layouts/urunStyle.php";
?>

<html lang="en">
  <head>
    <title>BOSKAN</title>

    <!-- Script / Style Dahil Ediliyor -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../../build/css/custom.min.css" rel="stylesheet">
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../build/js/custom.min.js"></script>
    <!-- Script / Style Dahil Edildi -->
  </head>
<?php
  urunStyle();
?>
  <body class="nav-md">
  <div class="container body">
      
      <!-- Üst Menü Başlangıç -->
      <?php
        topNavBar();
      ?>
      <!-- Üst Menü Bitiş -->


      <!-- Ürün Paneli Başlangıç -->
      <div class="right_col" role="main">
        <div class="">
          

          <!-- Parça Türü ve Link Ataması Başlangıç -->
          <div class="page-title">
            <div class="title_left">
              <h6><a href="../mainPage.php">Anasayfa</a>  / Sabit Disk</h6>
            </div>
          </div>  
          <!-- Parça Türü ve Link Ataması Bitiş -->

          
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_content">
                  <div class="col-md-7 col-sm-7 ">

                  <!-- Ana Ürün Resmi Başlangıç-->
                    <div>
                      <img src="images/urun72_1.jpg" width="390px" height="390" alt="..." />
                    </div>
                  <!-- Ana Ürün Resmi Bitiş -->

                    <div class="product_gallery">
                      <a>
                        <img src="images/urun72_2.jpg" alt="..." />
                      </a>
                      <a>
                        <img src="images/urun72_3.jpg" alt="..." />
                      </a>
                      <a>
                        <img src="images/urun72_4.jpg" alt="..." />
                      </a>
                    </div>
                  </div>

                  <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

<!-- Parça Adı Başlangıç -->
  <h3 class="prod_title"> WD 1TB Red 64MB 5400rpm 3.5 SATA 3.0 NAS Harddisk</h3>
<!-- Parça Adı Bitiş -->
<br /><br />
                    
<!-- Parça Fiyatı Başlangıç -->              
  <div class="">
    <div class="product_price">
      <h1 class="price">1.589,72 ₺</h1>
      <br>
      <p>Fiyatla %60 KDV Dahildir</p>
    </div>
  </div>
<!-- Parça Fiyatı Bitiş -->              



                  <div class="">
                    <button type="button" class="btn btn-info">Stokta</button>
                      <button type="button" class="btn btn-warning">%10 İndirim</button>
                    </div>
                  </div>


        


<div class="col-md-12">

  <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Temel Bilgiler</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Özellikler</a>
    </li>
  </ul>

<!-- Bilgi ve Tablo İçerik Başlangıç -->
<div class="tab-content" id="myTabContent">



<!-- Temel Bilgiler Başlangıç -->
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
          <!-- <img src="images/urun_56_bilgi.jpg"/> -->
          WD 1TB Red 64MB 5400rpm 3.5" SATA 3.0 NAS Harddisk
</br>
Her uyumlu NAS sistemi için veri depolama ihtiyaçlarınızı karşılamanıza yardımcı bir WD Red disk vardır. 10 TB-a kadar kapasitesi olan disklerle WD Red, yüksek performanslı NAS depolama çözümünü kurmak isteyen müşteriler için kapsamlı çözümler sunar. Tek yuvadan 8 yuvaya kadar NAS sistemleri için üretilen WD Red, değerli verilerinizi depolama becerisini tek bir güçlü birimde bir araya getirir. WD Red ile geleceğe hazırsınız.
</br>
</br>
NAS için disk
</br>
Masaüstü diskleri, genellikle bir NAS sisteminin zorlu koşulları için test edilmez veya tasarlanmazlar. NAS-ınız için doğru tercihi yapın ve verilerinizi koruyup optimum performansı sürdürmek için gerekli bir dizi özelliklere sahip diski seçin.
</br>
</br>
EV İÇİN WD RED
</br>
Dijital içeriğinizi TV-nize, bilgisayarınıza ve daha fazlasına aktarın, yedekleyin, organize edin ve zahmetsiz şekilde paylaşın. NASware teknolojisi, cihazlarınızda daha iyi video oynatımı sağlamak için disklerinizin NAS sisteminizle olan uyumluluğunu artırır.
        </div>

<!-- Temel Bilgiler Bitiş -->
    
    
<!-- Tablo İçerikleri Başlangıç -->
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <div class="x_content">
    <table class="table">
      <thead>
        <tr>
          <th>Özellik</th>
          <th>Açıklama</th>
        </tr>
        <tr>
          <td>Disk Devir Hızıı</td>
          <td>5400 RPM</td>
        </tr>
        <tr>
          <td>Disk Boyutu</td>
          <td>3.5"</td>
        </tr>
        <tr>
          <td>Kapasite</td>
          <td>1TB</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!-- Tablo İçerikleri Bitiş -->
    
</div>
<!-- Bilgi ve Tablo İçerik Bitiş -->

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Ürün Paneli Bitiş -->
      
</div>
</div>
</body>
</html>
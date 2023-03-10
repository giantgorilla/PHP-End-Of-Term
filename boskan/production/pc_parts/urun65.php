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
              <h6><a href="../mainPage.php">Anasayfa</a>  / SSD</h6>
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
                      <img src="images/urun65_1.jpg" width="390px" height="390" alt="..." />
                    </div>
                  <!-- Ana Ürün Resmi Bitiş -->

                    <div class="product_gallery">
                      <a>
                        <img src="images/urun65_2.jpg" alt="..." />
                      </a>
                      <a>
                        <img src="images/urun65_3.jpg" alt="..." />
                      </a>
                      <a>
                        <img src="images/urun65_4.jpg" alt="..." />
                      </a>
                    </div>
                  </div>

                  <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

<!-- Parça Adı Başlangıç -->
  <h3 class="prod_title"> CORSAIR 2TB Force MP600 PRO NVMe PCIe Gen4 M.2 SSD (7000MB Okuma / 6500MB Yazma) </h3>
<!-- Parça Adı Bitiş -->
<br /><br />
                    
<!-- Parça Fiyatı Başlangıç -->              
  <div class="">
    <div class="product_price">
      <h1 class="price">11.674,92 ₺</h1>
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
          AŞIRI GEN4 DEPOLAMA PERFORMANSI
</br>
PCIe Gen4 x4 olağanüstü veri performansı denetleyicisi, standart M.2 SSD-leri toz içinde bırakan okuma, yazma ve yanıt süreleri için 7.000 MB/sn-ye kadar sıralı okuma ve 6.550 MB/sn-ye kadar sıralı yazma hızları* sunar.</br>
</br>
YÜKSEK HIZLI GEN4 PCIE X4 NVME M.2 ARAYÜZÜ
</br>
Maksimum bant genişliği için PCIe Gen 4 NVMe 1.4 teknolojisinden yararlanan MP600 PRO, inanılmaz depolama performansı sunar.
</br>
</br>
ANKASTRE ALÜMİNYUM ISITICI
</br>
Isıyı dağıtmaya ve kısmayı azaltmaya yardımcı olur, böylece SSD-niz sürekli yüksek performansı korur.</br>
</br>
YÜKSEK YOĞUNLUK 3D TLC NAND
</br>
Yüksek hızlı performansı 3.600 TB-a varan yazılı dayanıklılıkla bir araya getirerek, sürücünüzün uzun yıllar boyunca dayanmasını ve iyi performans göstermesini sağlar.
</br>
</br>
M.2 2280 FORM FAKTÖRÜ
</br>
Kablo gerektirmeden doğrudan ana kartınıza sığar.
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
          <td>Okuma Hızı</td>
          <td>7000 MB</td>
        </tr>
        <tr>
          <td>Yazma Hızı</td>
          <td>6500 MB</td>
        </tr>
        <tr>
          <td>Kapasite</td>
          <td>2TB</td>
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
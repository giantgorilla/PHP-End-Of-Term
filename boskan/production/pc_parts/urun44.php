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
              <h6><a href="../mainPage.php">Anasayfa</a>  / Anakart</h6>
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
                      <img src="images/urun44_1.jpg" width="390px" height="390" alt="..." />
                    </div>

                  <!-- Ana Ürün Resmi Bitiş -->

                  <div class="product_gallery">
                      <a>
                        <img src="images/urun44_2.jpg" alt="..." />
                      </a>
                      <a>
                        <img src="images/urun44_3.jpg" alt="..." />
                      </a>
                      <a>
                        <img src="images/urun44_4.jpg" alt="..." />
                      </a>
                    </div>
                  </div>
                  <!-- Ana Ürün Resmi Bitiş -->
                  <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

<!-- Parça Adı Başlangıç -->
  <h3 class="prod_title"> GIGABYTE X670 GAMING X AX 6000MHz(OC) DDR5 Soket AM5 HDMI Type-C M.2 ATX Anakart </h3>
<!-- Parça Adı Bitiş -->
<br /><br />
                    
<!-- Parça Fiyatı Başlangıç -->              
  <div class="">
    <div class="product_price">
      <h1 class="price">8.713,84 ₺</h1>
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
          Eşsiz Performans
</br>
          Teknoloji bu kadar hızlı hareekt ederken, GIGABYTE hala en son trendlere ayak uydurmakta ve müşterilerimize gelişmiş özellikler ve en son teknoloji sunmaktadır.
          GIGABYTE Oyun Serisi anakartlar, oyun performansını optimize etmek için yükseltilmiş güç çözümü, en son depolama standartları ve olağanüstü bağlantı ile birlikte gelir.
        
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
      </thead>
      <tbody>
      <tr>
          <td>PCI Express 5.0</td>
          <td>Yok</td>
        </tr>
        <tr>
          <td>Soket Tipi</td>
          <td>AM5</td>
        </tr>
        <tr>
          <td>AMD Chipset</td>
          <td>AMD X670</td>
        </tr>
        <tr>
          <td>RAM Tipi</td>
          <td>DDR5</td>
        </tr>
        <tr>
          <td>3.0</td>
          <td>Yokt</td>
        </tr>
        <tr>
          <td>2.0</td>
          <td>Yok</td>
        </tr>
        <tr>
          <td>M.2</td>
          <td>3 Adet</td>
        </tr>
        <tr>
          <td>Display Port</td>
          <td>Yok</td>
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
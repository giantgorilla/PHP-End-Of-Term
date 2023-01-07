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
              <h6><a href="../mainPage.php">Anasayfa</a>  / PowerSupply</h6>
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
                      <img src="images/urun63_1.jpg" width="390px" height="390" alt="..." />
                    </div>
                  <!-- Ana Ürün Resmi Bitiş -->

                    <div class="product_gallery">
                      <a>
                        <img src="images/urun63_2.jpg" alt="..." />
                      </a>
                      <a>
                        <img src="images/urun63_3.jpg" alt="..." />
                      </a>
                      <a>
                        <img src="images/urun63_4.jpg" alt="..." />
                      </a>
                    </div>
                  </div>

                  <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

<!-- Parça Adı Başlangıç -->
  <h3 class="prod_title"> CORSAIR HX1500i 1500W 80+ Platinum Full Modüler 140mm Fanlı ATX PSU </h3>
<!-- Parça Adı Bitiş -->
<br /><br />
                    
<!-- Parça Fiyatı Başlangıç -->              
  <div class="">
    <div class="product_price">
      <h1 class="price">9.599,03 ₺</h1>
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
         Güçlü Bağlantılar
</br>
Üç EPS12V könektör ve tamamen modüler kablolama ile HXi serisi platin güç kaynakları, en yeni nesil güç tüketen grafik kartları ve işlemciler de dahil olmak üzere bugünün ve geleceğin en zorlu bilgisayar yükseltmelerine güç sağlamak için gereken her bağlantıya sahiptir.
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
          <th>Özellik</th>
          <th>Açıklama</th>
        </tr>
      </thead>
      <tbody>
      <tr>
          <td>Güç</td>
          <td>1500W</td>
        </tr>
        <tr>
          <td>Modüler</td>
          <td>Full Modüler</td>
        </tr>
        <tr>
          <td>Fan Sayısı</td>
          <td>1</td>
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
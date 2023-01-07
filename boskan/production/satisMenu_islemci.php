<?php
require "page_layouts/settings.php";
require "page_layouts/footer.php";
require "page_layouts/sidebar_satis.php";
require "page_layouts/topbar_satis.php";
require "page_layouts/fiyatEtiketi_satis.php";
include_once 'connection.php'; // Bu fonksiyon include fonksiyonu ile aynı şekilde çalışarak dışarıdan dosya dahil etme olanağı sağlar. Tek farkı bir dosya içerisinde aynı dosyanın birden fazla çağrılmasını engeller.


session_start();
ob_start();

$activeUserID = $_SESSION["musteri_ID"];
$activeUserINFO = $_SESSION["adSoyad"];

if (!$_SESSION["musteri_ID"] && !$_SESSION["adSoyad"])
{
  session_destroy(); 
}
ob_end_flush();
?>


<html lang="en">

<head>
  <title>İşlemci</title>
  <link rel="icon" href="<?php siteIcon(); ?>" type="image/ico" />
  <!-- Bootstrap / Custom Font -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="../build/css/custom.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/0c09c13dd3.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Bitis-->
</head>
  
<?php
  fiyatEtiketi();
?>

<body class="nav-md">
<div class="container body">
<div class="main_container">
        
<!-- Sidebar Baslangıc -->
  <?php
    @sideBar($activeUserINFO);
  ?>
<!-- Sidebar Bitis -->

<!-- Top Navigation Baslangic -->
<?php
    @topBar($activeUserINFO);
  ?>
<!-- Top Navigation Bitis -->

<!-- Sayfa İçeriği Başlangıç -->

<div class="right_col" role="main">
<div class="">
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12">
<div class="x_panel">
  <div class="x_title">
    <h2>Öne Çıkan İşlemci Modelleri</h2>
      <div class="clearfix">
      </div>
  </div>
  
<div class="x_content">
  <div class="row">

<!-- Satış İçeriği Başlangıç  -->

    <!-- Ürün Kopyalama İçin Başlangıç  -->
    <div class="col-md-55">
      <a href="pc_parts/urun9.php">
        <div class="caption">
          <!-- Başlık  --> <p>AMD RYZEN 9 5900X 3.7GHz 64MB Önbellek 12 Çekirdek AM4 7nm İşlemci</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun9_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">8.863,23 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun10.php">
        <div class="caption">
          <!-- Başlık  --> <p>AMD RYZEN 5 5600X 3.7GHz 32MB Önbellek 6 Çekirdek AM4 7nm İşlemci</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun10_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">3.933,68 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun11.php">
        <div class="caption">
          <!-- Başlık  --> <p>Intel i7 13700K 3.4GHz 30MB Önbellek 16 Çekirdek 1700 10nm İşlemci</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun11_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">11.051,09 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun12.php">
        <div class="caption">
          <!-- Başlık  --> <p>AMD Ryzen 9 7950X 4.5GHz 64MB Önbellek 16 Çekirdek AM5 5nm İşlemci</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun12_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">14.440,09 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun13.php">
        <div class="caption">
          <!-- Başlık  --> <p>Intel i3 12100F 4.3GHz 12MB Önbellek 4 Çekirdek Soket 1700 10nm İşlemci</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun13_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">2.341,12 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun14.php">
        <div class="caption">
          <!-- Başlık  --> <p>AMD RYZEN 7 5700G 3.8GHz 16MB Önbellek 8 Çekirdek AM4 7nm İşlemci</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun14_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">4.829,96 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun15.php">
        <div class="caption">
          <!-- Başlık  --> <p>AMD Ryzen 5 7600X 4.7GHz 32MB Önbellek 6 Çekirdek AM5 5nm İşlemci</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun15_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">6.224,18 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun16.php">
        <div class="caption">
          <!-- Başlık  --> <p>AMD RYZEN 5 5600X 3.7GHz 32MB Önbellek 6 Çekirdek AM4 7nm İşlemci</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun16_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">3.933,68 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun17.php">
        <div class="caption">
          <!-- Başlık  --> <p>AMD Ryzen 9 7950X 4.5GHz 64MB Önbellek 16 Çekirdek AM5 5nm İşlemci</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun17_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">14.440,09 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun61.php">
        <div class="caption">
          <!-- Başlık  --> <p>Intel Core i5 12600KF 3.7GHz 20MB Önbellek 10 Çekirdek 1700 10nm İşlemci</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun61_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">6.696,54 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <!-- Ürün Kopyalama İçin Bitiş  -->

<!-- Satış İçeriği Bitiş  -->

  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Sayfa İçeriği Bitiş -->

<!-- Footer -->
<footer>
  <?php
    footer();
  ?>
</footer>
<!-- Footer Bitiş -->

</div>
</div>

<!-- Custom Theme Scripts -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <script src="../vendors/nprogress/nprogress.js"></script>
  <script src="../build/js/custom.min.js"></script>
<!-- Custom Theme Scripts Bitis -->

</body>
</html>
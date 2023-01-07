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
  <title>Fan</title>
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
    <h2>Öne Çıkan Fan Modelleri</h2>
      <div class="clearfix">
      </div>
  </div>
  
<div class="x_content">
  <div class="row">

<!-- Satış İçeriği Başlangıç  -->

    <!-- Ürün Kopyalama İçin Başlangıç  -->
    <div class="col-md-55">
      <a href="pc_parts/urun49.php">
        <div class="caption">
          <!-- Başlık  --> <p>Thermaltake Riing RGB 120mm Fan</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun49_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">514.91 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun50.php">
        <div class="caption">
          <!-- Başlık  --> <p>Cooler Master MOBIUS 120P 30. Yıl Serisi ARGB 120mm Fan</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun50_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">749.00 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun51.php">
        <div class="caption">
          <!-- Başlık  --> <p>CORASIR AF120 ELITE 120mm Fluid Dynamic PWM Beyaz Kasa Fanı</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun51_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">592.00 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun52.php">
        <div class="caption">
          <!-- Başlık  --> <p>CORSAIR AF140 ELITE 140mm Fluid Dynamic PWM Siyah Kasa Fan</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun52_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">643.64 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun53.php">
        <div class="caption">
          <!-- Başlık  --> <p>CORSAIR Air Serisi AF140 (2018) Mavi Led 140mm Fan (2 li Paket)</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun53_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">720.00 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun54.php">
        <div class="caption">
          <!-- Başlık  --> <p>Thermaltake Pure 12 ARGB 120mm Radyatör Fan (3 lü Paket,Fan Kontrolcülü)</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun54_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">1.248,65 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun55.php">
        <div class="caption">
          <!-- Başlık  --> <p>CORSAIR iCUE SP140 High Static Pressure Yeşil Led 140mm Fan (2 li Paket)</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun55_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">1.000,00 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun56.php">
        <div class="caption">
          <!-- Başlık  --> <p>CORSAIR AF120 ELITE 140mm Fluid Dynamic PWM Beyaz Kasa Fanı</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun56_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">643.64 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun57.php">
        <div class="caption">
          <!-- Başlık  --> <p>CORSAIR iCUE SP140 High Static Pressure Yeşil Led 140mm Fan (2 li Paket)</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun57_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">1.004.07 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun58.php">
        <div class="caption">
          <!-- Başlık  --> <p>CORSAIR iCUE SP120 RGB ELITE 120mm Fan (3 lü Paket + Fan Kontrolcülü)</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun58_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">1416.00 ₺</button>   
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
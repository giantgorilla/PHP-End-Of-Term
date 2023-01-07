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
  <title>Anasayfa</title>
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
    <h2>Öne Çıkan Ürünler</h2>
      <div class="clearfix">
      </div>
  </div>
  
<div class="x_content">
  <div class="row">

<!-- Satış İçeriği Başlangıç  -->

    <!-- Ürün Kopyalama İçin Başlangıç  -->
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
      <a href="pc_parts/urun45.php">
        <div class="caption">
          <!-- Başlık  --> <p>MSI MEG Z690 UNIFY 6666MHz(OC) DDR5 Soket 1700 M.2 ATX Anakart</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun45_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">14.016,84 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun8.php">
        <div class="caption">
          <!-- Başlık  --> <p>MSI GeForce RTX 4080 16GB GAMING X TRIO 16GB GDDR6X 256 Bit Ekran Kartı</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun8_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">39.261,51 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun26.php">
        <div class="caption">
          <!-- Başlık  --> <p>GSKILL 64GB (2x32GB) Trident Z5 Neo RGB 6000MHz CL32 DDR5 1.4V AMD EXPO Siyah Dual Kit Ram</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun26_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">11.025,92 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun75.php">
        <div class="caption">
          <!-- Başlık  --> <p>Toshiba MG Serisi MG09ACA18TE 18TB 7200Rpm 512MB 3.5” SATA 3 Harddisk</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun75_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">6.499,00 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun65.php">
        <div class="caption">
          <!-- Başlık  --> <p>CORSAIR 2TB Force MP600 PRO NVMe PCIe Gen4 M.2 SSD (7000MB Okuma / 6500MB Yazma)</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun65_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">11.674,92 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun92.php">
        <div class="caption">
          <!-- Başlık  --> <p>Cooler Master MasterAir MA612 Stealth 120mm ARGB İşlemci Hava Soğutucu</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun92_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">2.393,26 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun83.php">
        <div class="caption">
          <!-- Başlık  --> <p>Thermaltake Water 3.0 120 ARGB Sync Edition All-In-One Sıvı Soğutma Sistemi (CL-W232-PL12SW-A)</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun83_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">5.478,00 ₺</button>   
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
    <div class="col-md-55">
      <a href="pc_parts/urun63.php">
        <div class="caption">
          <!-- Başlık  --> <p>CORSAIR HX1500i 1500W 80+ Platinum Full Modüler 140mm Fanlı ATX PSU</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun63_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">9.599,03 ₺</button>   
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
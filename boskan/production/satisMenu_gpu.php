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
  <title>Ekran Kartı</title>
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
    <h2>Öne Çıkan Ekran Kartı Modelleri</h2>
      <div class="clearfix">
      </div>
  </div>
  
<div class="x_content">
  <div class="row">

<!-- Satış İçeriği Başlangıç  -->

    <!-- Ürün Kopyalama İçin Başlangıç  -->
    <div class="col-md-55">
      <a href="pc_parts/urun1.php">
        <div class="caption">
          <!-- Başlık  --> <p>MSI RTX 2060 VENTUS GP OC 6GB EKRAN KARTI</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun1_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">5999.00 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun2.php">
        <div class="caption">
          <!-- Başlık  --> <p>ASUS GeForce RTX 3060 DUAL V2 OC 12GB GDDR6 192 Bit</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun2_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">10.649,00 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun3.php">
        <div class="caption">
          <!-- Başlık  --> <p>GIGABYTE Radeon RX 6600 EAGLE 8G8GB GDDR6 128 Bit</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun3_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">6.929,00 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun4.php">
        <div class="caption">
          <!-- Başlık  --> <p>ASUS Radeon RX550 2GB GDDR5 64 Bit Ekran Kartı</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun4_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">2.439,00 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun5.php">
        <div class="caption">
          <!-- Başlık  --> <p>AASUS RX 6700 XT DUAL 12GB GDDR6 192 Bit Ekran Kartıı</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun5_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">11.711,41 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun6.php">
        <div class="caption">
          <!-- Başlık  --> <p>NVIDIA GeForce RTX 3050 AERO ITX 8G OC 8GB GDDR6 128 Bit</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun6_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">9.659,92 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun7.php">
        <div class="caption">
          <!-- Başlık  --> <p>MSI Radeon RX 6500 XT MECH 2X 4G OC 4GB GDDR6 64 Bit Ekran Kartı</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun7_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">5.006,98 ₺</button>   
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
      <a href="pc_parts/urun59.php">
        <div class="caption">
          <!-- Başlık  --> <p>ASUS Radeon RX 7900XTX 24GB GDDR6 384 Bit Ekran Kartı</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun59_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">31.827,11 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun60.php">
        <div class="caption">
          <!-- Başlık  --> <p>ASUS TUF GAMING GeForce RTX 3060Ti OC Edition ARGB 8GB GDDR6X 192Bit Ekran Kartı</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun60_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">15.185,03 ₺</button>   
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
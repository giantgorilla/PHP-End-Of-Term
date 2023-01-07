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
  <title>SSD</title>
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
    <h2>Öne Çıkan SSD Modelleri</h2>
      <div class="clearfix">
      </div>
  </div>
  
<div class="x_content">
  <div class="row">

<!-- Satış İçeriği Başlangıç  -->

    <!-- Ürün Kopyalama İçin Başlangıç  -->
    <div class="col-md-55">
      <a href="pc_parts/urun46.php">
        <div class="caption">
          <!-- Başlık  --> <p>MSI 1TB SPATIUM M450 Gen4x4 M.2 2280 SSD (3600MB Okuma / 3000MB Yazma)</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun46_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">2.424,19 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun47.php">
        <div class="caption">
          <!-- Başlık  --> <p>MSI 1TB SPATIUM M470 Gen4x4 M.2 2280 SSD (5000MB Okuma / 4400MB Yazma)</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun47_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">2.741,38 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun48.php">
        <div class="caption">
          <!-- Başlık  --> <p>MSI 1TB SPATIUM M480 HS NVMe 2280 M.2 SSD (7000MB Okuma / 5500MB Yazma)</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun48_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">3.489,02 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun69.php">
        <div class="caption">
          <!-- Başlık  --> <p>GIGABYTE AORUS 1TB RGB AIC NVMe M.2 SSD (3480MB Okuma / 3080MB Yazma)</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun69_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">5.061,68 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun70.php">
        <div class="caption">
          <!-- Başlık  --> <p>MSI 500GB M371 Gen3x4 M.2 NVMe SSD (1900MB Okuma / 1000MB Yazma)</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun70_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">899.00 ₺</button>   
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
      <a href="pc_parts/urun66.php">
        <div class="caption">
          <!-- Başlık  --> <p>ASUS ROG STRIX 1TB SQ7 Gen4x4 M.2 2280 NVMe SSD (7000MB Okuma / 6000MB Yazma)</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun66_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">4.367,54 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun67.php">
        <div class="caption">
          <!-- Başlık  --> <p>ASUS ROG STRIX Arion S500 500GB USB-C 3.2 Aura Sync Taşınabilir SSD</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun67_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">3.179,44 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun68.php">
        <div class="caption">
          <!-- Başlık  --> <p>GIGABYTE 240GB SATA 3.0 2.5 SSD (500MB Okuma/420MB Yazma)</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun68_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">635,89 ₺</button>   
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-55">
      <a href="pc_parts/urun64.php">
        <div class="caption">
          <!-- Başlık  --> <p>CORSAIR 2TB Force MP400 NVMe M.2 2280 SSD (3480MB Okuma / 3000MB Yazma)</p> 
        </div>
        <div class="image view view-first">
          <!-- Resim İçeriği  --><img style="width: 100%; height: 60%; " src="pc_parts/images/urun64_1.jpg" alt="image" />
        </div>     
        <div class="caption">
          <div class="flex-end">      
            <!-- Fiyat  --><button type="button" class="btn btn-warning">5.926,48 ₺</button>   
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
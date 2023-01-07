<?php
// Admin Depocu ve Personelin Panellerine Erişebilecek
require "page_layouts/settings.php"; // require, include gibi belirtilen dosyayı kodun yazıldığı dosya içerisine eklemek için kullanılır. Ama include gibi uyarı vermek yerine hata verir ve kodun çalışmasını durdurur. require fonksiyonunun da kullanımı include fonksiyonu ile aynıdır.
require "page_layouts/sidebar.php";
require "page_layouts/navbar.php";
require "page_layouts/footer.php";
include_once 'connection.php'; // Bu fonksiyon include fonksiyonu ile aynı şekilde çalışarak dışarıdan dosya dahil etme olanağı sağlar. Tek farkı bir dosya içerisinde aynı dosyanın birden fazla çağrılmasını engeller.

session_start();
ob_start();

$activePersonelINFO = $_SESSION["adSoyad"];
$activePersonelID = $_SESSION["personel_ID"];
$yetkiSeviyesi = $_SESSION["yetkiSeviyesi"];

if ($yetkiSeviyesi != 1):
  echo ("<script> alert('Karşm Sen Admin Değilsin He Çok Dolanma Buralarda');</script>");
  session_destroy(); 
  header('Location: login.php');
endif;

ob_end_flush();

// Müşteri Yaş Ortalaması
$musteriYasQuery = mysqli_query($baglan, "SELECT COUNT(musteri.musteri_ID) AS musteriSayisi,ROUND(AVG((EXTRACT(YEAR FROM now())-EXTRACT(YEAR FROM musteri.dogum_Tarihi))),1) AS yas FROM musteri");

			$row = mysqli_fetch_array($musteriYasQuery);
			$musteriYasOrtalamasi = $row["yas"];
      $musteriSayisi = $row["musteriSayisi"];

// En Popüler Ürün
$urunQuery = mysqli_query($baglan, "SELECT CONCAT(ureticifirma.firmaAdi,' ',bilgisayar_parcasi.model) AS ParcaAdi ,SUM(urunsatis.adet) AS SatisAdedi
                                    FROM urunsatis,bilgisayar_parcasi,ureticifirma 
                                    WHERE urunsatis.urunID
                                    AND ureticifirma.firma_ID = bilgisayar_parcasi.ureticiID
                                    AND urunsatis.urunID = bilgisayar_parcasi.urun_ID
                                    GROUP BY urunsatis.urunID
                                    ORDER BY SatisAdedi DESC
                                    LIMIT 1;");

$row = mysqli_fetch_array($urunQuery);
$parcaAdi = $row["ParcaAdi"];


// Aylık Satış Miktarı
$aylikSatisQuery = mysqli_query($baglan, "SELECT SUM(urunsatis.adet) AS SatisAdedi
                                          FROM urunsatis,bilgisayar_parcasi
                                          WHERE month(urunsatis.kesimTarihi) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
                                          AND urunsatis.urunID = bilgisayar_parcasi.urun_ID;");

$row = mysqli_fetch_array($aylikSatisQuery);
$aylikSatisMiktari = $row['SatisAdedi'];

// Aylık Kazanç
$aylikKazancQuery = mysqli_query($baglan, "SELECT SUM(urunsatis.adet*bilgisayar_parcasi.birimFiyat) AS Fiyat
                                           FROM urunsatis,bilgisayar_parcasi
                                           WHERE month(urunsatis.kesimTarihi) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
                                           AND urunsatis.urunID = bilgisayar_parcasi.urun_ID;");

$row = mysqli_fetch_array($aylikKazancQuery);
$aylikKazanc = $row['Fiyat'];

// Personel Maaşları
$personelMaasiQuery = mysqli_query($baglan, "SELECT SUM(personel.maas) AS PersonelMaas FROM personel;");

$row = mysqli_fetch_array($personelMaasiQuery);
$toplamPersonelMaasi = $row['PersonelMaas'];

// Toplam Satış Adedi
$toplamSatisQuery = mysqli_query($baglan, "SELECT SUM(urunsatis.adet) AS SatisAdedi
                                           FROM urunsatis,bilgisayar_parcasi
                                           WHERE urunsatis.urunID = bilgisayar_parcasi.urun_ID;");

$row = mysqli_fetch_array($toplamSatisQuery);
$toplamSatis = $row['SatisAdedi'];

// Aylık Veri Çekmeye Başlıyoruz
$tur_Adi='tur_Adi';
$SatisAdedi='SatisAdedi';

// Ekim Verileri
$ekimQuery = mysqli_query($baglan, "SELECT parca_tur.tur_Adi ,SUM(urunsatis.adet) AS SatisAdedi , urunsatis.kesimTarihi
                                    FROM urunsatis,bilgisayar_parcasi,parca_tur
                                    WHERE month(urunsatis.kesimTarihi) = MONTH(CURRENT_DATE - INTERVAL 3 MONTH)
                                    AND urunsatis.urunID = bilgisayar_parcasi.urun_ID
                                    AND bilgisayar_parcasi.tur_ID = parca_tur.tur_ID
                                    GROUP BY parca_tur.tur_ID;
                                   ");
if (mysqli_num_rows($ekimQuery) != 0) {
  
  while($read_ekim = mysqli_fetch_array($ekimQuery))
  {
    $ekim[] = $read_ekim['SatisAdedi'];
  }
}

// Kasım Verileri
$kasimQuery = mysqli_query($baglan, "SELECT parca_tur.tur_Adi ,SUM(urunsatis.adet) AS SatisAdedi , urunsatis.kesimTarihi
                                     FROM urunsatis,bilgisayar_parcasi,parca_tur
                                     WHERE month(urunsatis.kesimTarihi) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH)
                                     AND urunsatis.urunID = bilgisayar_parcasi.urun_ID
                                     AND bilgisayar_parcasi.tur_ID = parca_tur.tur_ID
                                     GROUP BY parca_tur.tur_ID;
                          ");
if (mysqli_num_rows($kasimQuery) != 0) {
  
  while($read_Kasim = mysqli_fetch_array($kasimQuery))
  {
    $kasim[] = $read_Kasim['SatisAdedi'];
  }
}

// Aralık Verileri
$aralikQuery = mysqli_query($baglan, "SELECT parca_tur.tur_Adi ,SUM(urunsatis.adet) AS SatisAdedi , urunsatis.kesimTarihi
                                      FROM urunsatis,bilgisayar_parcasi,parca_tur
                                      WHERE month(urunsatis.kesimTarihi) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
                                      AND urunsatis.urunID = bilgisayar_parcasi.urun_ID
                                      AND bilgisayar_parcasi.tur_ID = parca_tur.tur_ID
                                      GROUP BY parca_tur.tur_ID;");
if (mysqli_num_rows($aralikQuery) != 0) {
  
  while($read_Aralik = mysqli_fetch_array($aralikQuery))
  {
    $aralik[] = $read_Aralik['SatisAdedi'];
  }
}

// Genel Satış Verileri
$toplamSatisQuery = mysqli_query($baglan, "SELECT parca_tur.tur_Adi ,SUM(urunsatis.adet) AS SatisAdedi
                                      FROM urunsatis,bilgisayar_parcasi,parca_tur
                                      WHERE urunsatis.urunID = bilgisayar_parcasi.urun_ID
                                      AND bilgisayar_parcasi.tur_ID = parca_tur.tur_ID
                                      GROUP BY parca_tur.tur_ID;");
if (mysqli_num_rows($toplamSatisQuery) != 0) {
  
  while($read_toplamSatis = mysqli_fetch_array($toplamSatisQuery))
  {
    $genelToplamSatis[] = $read_toplamSatis['SatisAdedi'];
  }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php siteBasligi(); ?></title>
    <link rel="icon" href="<?php siteIcon(); ?>" type="image/ico" />
      <!-- Bootstrap / Custom Theme Style Basla-->
      <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
      <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
      <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
      <link href="../build/css/custom.min.css" rel="stylesheet">
      <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
      <script src="https://kit.fontawesome.com/0c09c13dd3.js" crossorigin="anonymous"></script>

      <!-- Bootstrap / Custom Theme Style Bitis -->
  </head>
  <?php
  profilePicStyle();
?>

<body class="nav-md">

<!-- SideBar Başlangıç -->
<?php
    sideBar($activePersonelINFO,$yetkiSeviyesi);
  ?>
<!-- SideBar Başlangıç -->

<!-- Top NavBar Başlangıç -->
  <?php
    adminNavbar($activePersonelINFO);
  ?>
<!-- Top NavBar Bitiş -->

        <!-- page content -->
        <div class="right_col" role="main" style="max-height: 2000px; min-height: 2000px;">
        <div class="row">
          
    <div class="col-md-3 col-md-3  tile_stats_count">
        <div class="x_panel">
          <span class="count_top"><i class="fa fa-user"></i> <b>&nbsp;Toplam Müşteri Sayısı</b></span>
          <div class="count"></div>
          <span class="count_bottom"><i class="green"><br><h6><?php echo $musteriSayisi; ?></h6></i></span>
        </div>
    </div>
    <div class="col-md-3 col-md-3  tile_stats_count">
        <div class="x_panel">
          <span class="count_top"><i class="fa fa-user"></i> <b>&nbsp;Ortalama Müşteri Yaşı</b></span>
          <div class="count"></div>
          <span class="count_bottom"><i class="green"><br><h6><?php echo $musteriYasOrtalamasi; ?></h6></i></span>
        </div>
    </div>
    <div class="col-md-3 col-md-3  tile_stats_count">
        <div class="x_panel">
          <span class="count_top"><i class="fa fa-user"></i> <b>&nbsp;En Popüler Ürün</b></span>
          <div class="count"></div>
          <span class="count_bottom"><i class="green"><br><h6><?php echo $parcaAdi; ?></h6></i></span>
        </div>
    </div>
    <div class="col-md-3 col-md-3  tile_stats_count">
        <div class="x_panel">
          <span class="count_top"><i class="fa fa-user"></i> <b>&nbsp;Tarih</b></span>
          <div class="count"></div>
          <span class="count_bottom"><i class="green"><br><h6><?php echo "Bugün " . date("d/m/Y") . "<br>"; ?></h6></i></span>
        </div>
    </div>




        
      </div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Satış Grafiği <small>| &nbsp3 Aylık</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-9 col-sm-12 ">
                      <div class="demo-container">
                      <div id="multi_barchart" style="height: 500px"></div>
                      </div>
                      <div class="tiles">
                        <div class="col-md-4 tile">
                          <br>
                          <h2>
                            <span>
                            <strong>Son 1 Aylık Satış : </strong>
                            <?php echo $aylikSatisMiktari; ?></span><hr><br>
                            
                          <h2>
                            
                          <span class="sparkline11 graph" style="height: 160px;">
                               <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                        <br>
                          <h2>
                            <span>
                            <strong>Aylık Toplam Kazanç : </strong>
                            <?php echo $aylikKazanc; ?>₺</span><hr><br>
                          <h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                               <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span><br><br>
                        </div>
                        <div class="col-md-4 tile">
                          <br>
                          <h2>
                            <span>
                            <strong>Toplam Parça Satış Adedi: </strong>
                            <?php echo $toplamSatis; ?></span><hr><br>
                            
                          <h2>
                            
                          <span class="sparkline11 graph" style="height: 160px;">
                               <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                      </div>

                    </div>

                    <div class="col-md-3 col-sm-12 ">
                      <div>
                        <div class="x_title">
                          <h2>Son İşlemler</h2>

                          <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                        
                        <!-- Listeleme Başlangıc -->

                        <?php

                          $logAdSoyad='AdSoyad';
                          $logTarih='islemTarihi';
                          $logIslem='islemTipi';
                          $logIp='ipAdress';

                          $logQuery = mysqli_query($baglan, "SELECT yetkiler.yetkiAdi , CONCAT(personel.adi,' ',personel.soyadi) AS AdSoyad ,
                                                            logkayit.ipAdress , logkayit.islemTipi , logkayit.islemTarihi 
                                                            FROM logkayit,personel,yetkiler
                                                            WHERE logkayit.personelID = personel.personel_ID
                                                            AND personel.yetkiID = yetkiler.yetkiID
                                                            GROUP BY logkayit.logID
                                                            ORDER BY logkayit.islemTarihi DESC
                                                            LIMIT 9;");
                          if(mysqli_num_rows($logQuery)!=0)
                          {
                            while($read_log = mysqli_fetch_array($logQuery))	
                            {
                              echo
                              "<li class='media event'>
                                <a class='pull-left border-aero profile_thumb'>
                                  <i class='fa fa-user blue'></i>
                                </a>
                                <div class='media-body'>
                                  <a class='title'>$read_log[$logAdSoyad]</a>
                                    <p><strong>$read_log[$logTarih]</strong> Tarihinde <strong>$read_log[$logIslem]</strong> Yaptı </p>
                                    <p>IP Adresi : <small>$read_log[$logIp]</small>
                                </div>
                                </li>
                              ";
                            }
                          }
                        ?>
                          
                        </ul>
                        
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              
              <div class="col-md-4 col-sm-6  widget_tally_box">
                <div class="x_panel">
                
                <h6><center>Kazanç / Maliyet Durumu</center></h6>
                <hr>
                <div class="clearfix"></div><br>
                <div id="kazancbar" style="height:400px"></div>
                
                </div> 
                
              </div>

              <!-- start of weather widget -->
              <div class="col-md-4 col-sm-6 ">
                
                <div class="x_panel">
                                    
                <div class="clearfix"></div>
                <h6><center>Haftalık Satılan Ürün</center></h6>
                <hr>

                <div id="linesmooth" style="height:400px"></div>
                <br>
                </div> 
              </div>
              <!-- end of weather widget -->

              <div class="col-md-4 col-sm-6 ">
                <div class="x_panel">
                                    
                <div class="clearfix"></div>
                <h6><center>Parça Popülerlik Grafiği</center></h6>
                <hr><br>
                  <div id="piechart" style="height: 400px"></div>

                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php
        footer();
        ?>
        
        <!-- /footer content -->
      </div>
    </div>

<!-- Custom Scripts Baslangic -->

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="../build/js/custom.min.js"></script>

<!-- Custom Scripts Bitis -->

<?php


// Son Haftalık Veri
$haftalikSatisQuery = mysqli_query($baglan, "SELECT CONCAT(day(kesimTarihi),' / ',month(kesimTarihi)) AS Tarih,SUM(urunsatis.adet) AS SatisSayisi FROM urunsatis
                                              WHERE kesimTarihi >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 1 MONTH)), INTERVAL -4 DAY)
                                              GROUP BY kesimTarihi
                                              ORDER BY kesimTarihi DESC;");
if (mysqli_num_rows($haftalikSatisQuery) != 0) {
  
  while($read_haftalikSatis = mysqli_fetch_array($haftalikSatisQuery))
  {
    $sonHafta[] = $read_haftalikSatis['Tarih'];
    $sonHaftaSatis[] = $read_haftalikSatis['SatisSayisi'];
  }
  
}


?>
<!-- Custom Charts Scripts -->
<script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.4.1/dist/echarts.min.js"></script>
<script type="text/javascript">
    var dom = document.getElementById('linesmooth');
    var myChart = echarts.init(dom, null, {
      renderer: 'canvas',
      useDirtyRect: false
    });
    var app = {};
    
    var option;

    option = {
  xAxis: {
    type: 'category',
    data:['<?php echo $sonHafta[6]; ?>', '<?php echo $sonHafta[5]; ?>', '<?php echo $sonHafta[4]; ?>',' <?php echo $sonHafta[3]; ?>',' <?php echo $sonHafta[2]; ?>', '<?php echo $sonHafta[1]; ?>', '<?php echo $sonHafta[0]; ?>']
  },
  yAxis: {
    type: 'value'
  },
  series: [
    {
      data: [<?php echo $sonHaftaSatis[6]; ?>, <?php echo $sonHaftaSatis[5]; ?>, <?php echo $sonHaftaSatis[4]; ?>, <?php echo $sonHaftaSatis[3]; ?>, <?php echo $sonHaftaSatis[2]; ?>, <?php echo $sonHaftaSatis[1]; ?>, <?php echo $sonHaftaSatis[0]; ?>],
      type: 'line'
    }
  ]
};

    if (option && typeof option === 'object') {
      myChart.setOption(option);
    }

    window.addEventListener('resize', myChart.resize);
  </script>
<!-- PieChart  -->
  <script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.4.1/dist/echarts.min.js"></script>

  <script type="text/javascript">
  var dom = document.getElementById('piechart');
  var myChart = echarts.init(dom, null, {
    renderer: 'canvas',
    useDirtyRect: false
  });
  var app = {};
  
  var option;
    option = {
    tooltip: {
    trigger: 'item'
  },
  legend: {
    top: '2%',
    left: 'center',
    
  },
  series: [
    {
    name: 'Parça Türü:',
    type: 'pie',
    radius: ['40%', '70%'],
    avoidLabelOverlap: false,
    itemStyle: {
      borderRadius: 10,
      borderColor: '#fff',
      borderWidth: 2
    },
    label: {
      show: false,
      position: 'center',
    },
    emphasis: {
      label: {
        show: false,
        fontSize: 15
      }
    },
    labelLine: {
      show: true
    },
    top:60,
    data: [
      { value: <?php echo $genelToplamSatis[1]; ?> , name: 'İşlemci' },
      { value: <?php echo $genelToplamSatis[4]; ?> , name: 'Anakart' },
      { value: <?php echo $genelToplamSatis[0]; ?> , name: 'Ekran Kartı' },
      { value: <?php echo $genelToplamSatis[2]; ?> , name: 'Bellek' },
      { value: <?php echo $genelToplamSatis[6]; ?> , name: 'HDD' },
      { value: <?php echo $genelToplamSatis[5]; ?> , name: 'SSD' },
      { value: <?php echo $genelToplamSatis[9]; ?> , name: 'Hava Soğutma' },
      { value: <?php echo $genelToplamSatis[8]; ?> , name: 'Sıvı Soğutma' },
      { value: <?php echo $genelToplamSatis[7]; ?> , name: 'Fan' },
      { value: <?php echo $genelToplamSatis[3]; ?> , name: 'Güç Kaynağı' }
    ]
    }
    
    ]
    };

    if (option && typeof option === 'object') {
      myChart.setOption(option);
    }

  window.addEventListener('resize', myChart.resize);
  </script>

  <!-- PieChart Bitis -->

<script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.4.1/dist/echarts.min.js"></script>

<script type="text/javascript">
    var dom = document.getElementById('multi_barchart');
    var myChart = echarts.init(dom, null, {
      renderer: 'canvas',
      useDirtyRect: false
    });
    var app = {};
    
    var option;

    const posList = [

];
app.configParameters = {
  rotate: {
    min: -90,
    max: 90
  },
  align: {
    options: {
      left: 'left',
      center: 'center',
      right: 'right'
    }
  },
  verticalAlign: {
    options: {
      top: 'top',
      middle: 'middle',
      bottom: 'bottom'
    }
  },
  position: {
    options: posList.reduce(function (map, pos) {
      map[pos] = pos;
      return map;
    }, {})
  },
  distance: {
    min: 0,
    max: 100
  }
};
app.config = {
  rotate: 90,
  align: 'left',
  verticalAlign: 'middle',
  position: 'insideBottom',
  distance: 15,
  onChange: function () {
    const labelOption = {
      rotate: app.config.rotate,
      align: app.config.align,
      verticalAlign: app.config.verticalAlign,
      position: app.config.position,
      distance: app.config.distance
    };
    myChart.setOption({
      series: [
        {
          label: labelOption
        },
        {
          label: labelOption
        },
        {
          label: labelOption
        },
        {
          label: labelOption
        }
      ]
    });
  }
};
const labelOption = {
  show: true,
  position: app.config.position,
  distance: app.config.distance,
  align: app.config.align,
  verticalAlign: app.config.verticalAlign,
  rotate: app.config.rotate,
  formatter: '{c}  {name|{a}}',
  fontSize: 12,
  rich: {
    name: {}
  }
};
option = {
  tooltip: {
    trigger: 'axis',
    axisPointer: {
      type: 'shadow'
    }
  },
  legend: {
    data: ['Forest', 'Steppe', 'Desert', 'Wetland']
  },
  xAxis: [
    {
      type: 'category',
      axisTick: { show: false },
      data: ['Ekim', 'Kasım','Aralık']
    }
  ],
  yAxis: [
    {
      type: 'value'
    }
  ],
  series: [
    {
      name: 'İşlemci',
      type: 'bar',
      barGap: 0,
      label: labelOption,
      emphasis: {
        focus: 'series'
      },
      data: [<?php echo $ekim[1]; ?>,<?php echo $kasim[1]; ?>,<?php echo $aralik[1]; ?>]
    },
    {
      name: 'Anakart',
      type: 'bar',
      label: labelOption,
      emphasis: {
        focus: 'series'
      },
      data: [<?php echo $ekim[4]; ?>,<?php echo $kasim[4]; ?>, <?php echo $aralik[4]; ?>]
    },
    {
      name: 'Ekran Kartı',
      type: 'bar',
      label: labelOption,
      emphasis: {
        focus: 'series'
      },
      data: [<?php echo $ekim[0]; ?>,<?php echo $kasim[0]; ?>,<?php echo $aralik[0]; ?>]
    },
    {
      name: 'Bellek',
      type: 'bar',
      label: labelOption,
      emphasis: {
        focus: 'series'
      },
      data: [<?php echo $ekim[2]; ?>,<?php echo $kasim[2]; ?>,<?php echo $aralik[2]; ?>]
    },
    {
      name: 'Sabit Disk',
      type: 'bar',
      label: labelOption,
      emphasis: {
        focus: 'series'
      },
      data: [<?php echo ($ekim[6]); ?>,<?php echo ($kasim[6]); ?>,<?php echo ($aralik[6]); ?>]
    },
    {
      name: 'SSD',
      type: 'bar',
      label: labelOption,
      emphasis: {
        focus: 'series'
      },
      data: [<?php echo ($ekim[5]); ?>,<?php echo ($kasim[5]); ?>,<?php echo ($aralik[5]); ?>]
    },
    {
      name: 'Sıvı Soğutma',
      type: 'bar',
      label: labelOption,
      emphasis: {
        focus: 'series'
      },
      data: [<?php echo ($ekim[8]); ?>,<?php echo ($kasim[8]); ?>,<?php echo ($aralik[8]); ?>]
    },
    {
      name: 'Haca Soğutma',
      type: 'bar',
      label: labelOption,
      emphasis: {
        focus: 'series'
      },
      data: [<?php echo ($ekim[9]); ?>,<?php echo ($kasim[9]); ?>,<?php echo ($aralik[9]); ?>]
    },
    {
      name: 'Güç Kaynağı',
      type: 'bar',
      label: labelOption,
      emphasis: {
        focus: 'series'
      },
      data: [<?php echo $ekim[3]; ?>,<?php echo $kasim[3]; ?>,<?php echo $aralik[3]; ?>]
    }
  ]
};

    if (option && typeof option === 'object') {
      myChart.setOption(option);
    }

    window.addEventListener('resize', myChart.resize);
  </script>


<script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.4.1/dist/echarts.min.js"></script>
<script type="text/javascript">
    var dom = document.getElementById('kazancbar');
    var myChart = echarts.init(dom, null, {
      renderer: 'canvas',
      useDirtyRect: true
    });
    var app = {};
    
    var option;

    const gaugeData = [
  {
    name: 'Kâr',
    title: {
    offsetCenter: ['0%', '-65%']
    },
    detail: {
    valueAnimation: true,
      offsetCenter: ['0%', '-115%'],
      color:'blue',
    }
  },
  {
    name: '',
    title: {
     
      offsetCenter: ['0%', '50%']
    },
    detail: {
     offsetCenter: ['0%', '-60%'],
      borderWidth: "0",
      color:"transparent"

    }
  },
  {
    name: 'Kazanç',
    title: {
      offsetCenter: ['0%', '-130%']
    },
    detail: {
      valueAnimation: false,
      offsetCenter: ['0%', '-45%'],
      borderWidth:'1'
      
      
    }
  },
  {
    name: 'Parça SatınAlım',
    title: {
      offsetCenter: ['0%', '40%']
    },
    detail: {
      valueAnimation: true,
      offsetCenter: ['0%', '58%']
      
    }
  },
  {
    name: 'İşletme Maliyetleri',
    title: {
      offsetCenter: ['0%', '-10%']
    },
    detail: {
      valueAnimation: true,
      offsetCenter: ['0%', '10%']
    }
  },
  
];
option = {
  series: [
    {
      type: 'gauge',
      startAngle: 90,
      endAngle: -270,
      pointer: {
        show: false
      },
      progress: {
        show: true,
        overlap: false,
        roundCap: true,
        clip: false,
        itemStyle: {
          borderWidth: 1,
          borderColor: '#464646'
        }
      },
      axisLine: {
        lineStyle: {
          width: 30
        }
      },
      max:<?php echo $aylikKazanc;?>,
      splitLine: {
        show: false,
        distance: 20,
        length: 10
      },
      axisTick: {
        show: false
      },
      axisLabel: {
        show: false,
        distance: 50
      },
      data: gaugeData,
      title: {
        fontSize: 10
      },
      detail: {
        width: 50,
        height: 14,
        fontSize: 10,
        color: 'auto',
        borderColor: 'auto',
        borderRadius: 20,
        borderWidth: 1,
        formatter: '{value}'
      }
    }
  ]
};
setInterval(function () {
  gaugeData[0].value = <?php echo $aylikKazanc;?>;
  gaugeData[2].value = <?php echo (($aylikKazanc*0.20)-$toplamPersonelMaasi);?>;
  
  gaugeData[3].value = <?php echo ($aylikKazanc*0.80);?>;
  gaugeData[4].value = <?php echo $toplamPersonelMaasi;?>;
  myChart.setOption({
    series: [
      {
        data: gaugeData,
        pointer: {
          show: false
        }
      }
    ]
  });
}, 2000);

  if (option && typeof option === 'object') {
    myChart.setOption(option);
  }

  window.addEventListener('resize', myChart.resize);
</script>


  </body>
</html>
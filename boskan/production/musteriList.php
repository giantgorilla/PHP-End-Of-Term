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

if(!isset($_SESSION["personel_ID"])) {
	header('Location: login.php');
}


if ($yetkiSeviyesi != 2):
  echo ("<script> alert('Karşm Sen Admin Değilsin He Çok Dolanma Buralarda');</script>");
  session_destroy(); 
  header('Location: login.php');
endif;

ob_end_flush();

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
       <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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
<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Müşteri Listesi</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="musteriTable" class="table table-striped table-bordered bulk_action" style="width:100%">
                      <thead>
                        <tr>
                          <th>Müşteri ID</th>
                          <th>Adı</th>
                          <th>Soyadı</th>
                          <th>Mail Adresi</th>
                          <th>Telefon Numarası</th>
                          <th>Yaş</th>
                          <th>Cinsiyet</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                      function myFunction()
                      {
                        echo ("<script> alert('Düzenle Panel');</script>");
                      }

                        $musteri_ID = 'musteri_ID';
                        $adi = 'adi';
                        $soyadi = 'soyadi';
                        $eMail = 'eMail';
                        $tel_No = 'tel_No';
                        $yas= 'yas';
                        $cinsiyetAdi = 'cinsiyetAdi'; 

                        
                        $personelQuery = mysqli_query($baglan, "SELECT musteri.* ,(EXTRACT(YEAR FROM NOW()) -  EXTRACT(YEAR FROM musteri.dogum_Tarihi)) AS yas, girisbilgileri.email AS eMail , cinsiyet.cinsiyetAdi,
                                                                CONCAT(ilceler.ilceID,' ',semtler.semtAdi,' ',mahalleler.mahalleAdi,' ',adres.ekAciklama,' ',ilceler.ilceAdi,'/',iller.ilAdi) AS adresYaz
                                                                FROM musteri,adres,iller,ilceler,mahalleler,semtler,girisbilgileri,cinsiyet
                                                                WHERE musteri.girisBilgiID = girisbilgileri.girisBilgiID
                                                                AND musteri.cinsiyetID = cinsiyet.cinsiyetID
                                                                AND musteri.adresID = adres.adresID
                                                                AND adres.ilID = iller.ilID
                                                                AND iller.ilID = ilceler.ilceID
                                                                AND ilceler.ilceID = semtler.ilceID
                                                                AND semtler.semtID = mahalleler.semtID
                                                                GROUP BY musteri.musteri_ID");
                        if(mysqli_num_rows($personelQuery)!=0)
                        {
                           while($read_personel = mysqli_fetch_array($personelQuery))	
                           {
                              echo "
                              <tr>
                                <td>$read_personel[$musteri_ID]</td>
                                <td>$read_personel[$adi]</td>
                                <td>$read_personel[$soyadi]</td>
                                <td>$read_personel[$eMail]</td>
                                <td>$read_personel[$tel_No]</td>
                                <td>$read_personel[$yas]</td>
                                <td>$read_personel[$cinsiyetAdi]</td>
                                <td>$read_personel[$adresYaz]</td>                              
                              </tr>
                            ";
                            }
                          }
                          else{
                            echo ("<script> alert('Veri Yok Dayi');</script>");
                          }
                        ?>
                      
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
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
      <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
      <script>
         $(document).ready(function() {
         $('#musteriTable').DataTable();
         } );
      </script>
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
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
  </body>
</html>
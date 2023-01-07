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
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
	  
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
      <script src="https://kit.fontawesome.com/0c09c13dd3.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="css/my-register.css">

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

<?php

$ad = $_POST["tBox_Ad"];
$soyad = $_POST["tBox_Soyad"];
$email = $_POST["tBox_Email"];

$sifre = $_POST["tBox_Sifre"];
$sifreTekrar = $_POST["tBox_SifreTekrar"];
$sifre_md5 = md5($sifre);

$dogumTarihi = $_POST["tBox_dogumTarihi"];
$telNo = $_POST["tBox_telNo"];
$maas = $_POST["tBox_Maas"];
$cinsiyet = $_POST["cinsiyet"];
$yetki = $_POST["yetki"];
$iseGiris = $_POST["tBox_iseGiris"];

$il = $_POST["ilSec"];
$ilce = $_POST["ilceSec"];
$semt = $_POST["semtSec"];
$mahalle = $_POST["mahalleSec"];
$adresAciklama = $_POST["adresAciklama"];



if($_POST['kaydetPersonel']){
  
  if(!$ad || !$soyad || !$email || !$sifre || !$sifreTekrar || !$telNo || !$dogumTarihi || !$cinsiyet || !$maas || !$yetki || !$iseGiris || !$il || !$ilce || !$semt || !$mahalle || !$adresAciklama)
  {
    echo $ad;
  }
  else
  {
    if($sifre != $sifreTekrar)
    {
      echo "<script type='text/JavaScript'>
              alert('Girilen Şifreler Uyumsuz');
            </script>";
      
    }
    else{
      $girisBilgiEkle = mysqli_query($baglan, "
      INSERT INTO girisbilgileri (email,password) 
      VALUES ('$email','$sifre_md5')");
        
      if($girisBilgiEkle)
      {
        $girisBilgiID = mysqli_query($baglan, "SELECT girisbilgileri.girisBilgiID
                                              FROM girisbilgileri 
                                              WHERE girisbilgileri.email = '$email'
                                              AND girisbilgileri.password = '$sifre_md5'
                                    ");
        $row = mysqli_fetch_array($girisBilgiID);
        $_SESSION["girisBilgiID"] = $row["girisBilgiID"];
        
        if($_SESSION["girisBilgiID"])
        {
          $girisBilgiID = $_SESSION["girisBilgiID"];

          $adresEkle = mysqli_query($baglan, "INSERT INTO adres (ilID,ilceID,semtID,mahalleID,ekAciklama) 
                                              VALUES ('$il','$ilce','$semt','$mahalle','$adresAciklama')
                                              ");
          
          if($adresEkle)
          {
            $adresID = mysqli_query($baglan, "SELECT adres.adresID
                                              FROM adres 
                                              WHERE adres.ilID = '$il'
                                              AND adres.ilceID = '$ilce'
                                              AND adres.semtID = '$semt'
                                              AND adres.mahalleID = '$mahalle'
                                              AND adres.ekAciklama = '$adresAciklama'
                                    ");
            $row = mysqli_fetch_array($adresID);
            $_SESSION["adresID"] = $row["adresID"];
            
            if($_SESSION["adresID"])
            {
              $adresID = $_SESSION["adresID"];

              $personelEkle = mysqli_query($baglan,"INSERT INTO personel(adi,soyadi,tel_No,maas,dogum_Tarihi,cinsiyetID,ise_Giris,yetkiID,adresID,girisBilgiID) 
                                              VALUES ('$ad','$soyad',$telNo,'$maas','$dogumTarihi','$cinsiyet',$iseGiris,$yetki,'$adresID','$girisBilgiID')
                                              ");
              
              if($personelEkle)
              {
                echo "Kayıt Başarılı"."<br>"."5 Saniye İçerisine Yönlendirileceksiniz...";
                header('Location:personelKaydedildi.php');
              }
            }
            else
            {
              echo "Adres Oluşturulamadı";
            }
          }
          
        }
        else
        {
          echo "GirişBilgiID Alınamadı";
        }
      }
      else
      {
        echo "Giriş Bilgileri Kaydedilemedi";
      }
    }  
  }

}

?>

<!-- page content -->
<br><br>
<div class="right_col" role="main">
<br><br><br><br><br><br>
<div id="wizard" class="form_wizard wizard_horizontal">

  <!-- Sayfa Numaraları -->
  <ul class="wizard_steps">


    <li>

      <a href="#step-1">
        <span class="step_no">1</span>
        <span class="step_descr">1. Adım<br/>
          <small>Giriş Bilgileri</small>
        </span>
      </a>
    </li>
    <li>
      <a href="#step-2">
        <span class="step_no">2</span>
        <span class="step_descr">2. Adım<br/>
          <small>Temel Bilgiler</small>
        </span>
      </a>
    </li>
    <li>
      <a href="#step-3">
        <span class="step_no">3</span>
        <span class="step_descr">3. Adım<br/>
          <small>Sözleşmeler</small>
        </span>
      </a>
    </li>
  </ul>

<!-- Formlar -->

  <!-- 1. Adım -->
<form method="POST" class="my-login-validation" novalidate="">
  <div id="step-1"><br><br>
  
    <!-- Ad Alma -->
    <div class="form-group row " style="padding-left: 80px;">
      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Adınız<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 ">
      <input type="text" name="tBox_Ad" class="form-control" value="" required autofocus>
      </div>
    </div>
    <br>
    <!-- Soyad Alma -->
    <div class="form-group row" style="padding-left: 80px;">
      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Soyadnınız<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 ">
      <input type="text" name="tBox_Soyad" class="form-control" required autofocus>
      </div>
    </div>
    <br>

      <!-- Mail Adresi Alma -->
      <div class="form-group row" style="padding-left: 80px;">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email1">E Posta<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="email" name="tBox_Email" class="form-control" required>
        </div>
        <div class="invalid-feedback">
        Mail Adresi Geçersiz
        </div>
      </div>
      <br>
      
      <!-- Şifre Alma -->
      <div class="form-group row" style="padding-left: 80px;">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="sifre">Şifre<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="password" name="tBox_Sifre" class="form-control" required data-eye>
        </div>
        <div class="invalid-feedback">
        Şifre Gereklidir
        </div>
      </div>
      <br>

      <!-- Şifre (Tekrar) Alma -->
      <div class="form-group row" style="padding-left: 80px;">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="sifre">Şifre (Tekrar)<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="password" name="tBox_SifreTekrar" class="form-control" required data-eye>
        </div>
        <div class="invalid-feedback">
        Şifre Gereklidir
        </div>
        
      </div>
      <!-- <p id='sifreHata' style="margin-left: 235px; margin-top: -5px;font-size:15px; color:red;">test</p> -->
      <br>

  </div>

  <!-- 2. Adım -->
  <div id="step-2"><br><br>
      
      <!-- Numara Alma -->
      <div class="form-group row" style="padding-left: 80px;">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Telefon Numara<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="tel" name="tBox_telNo" class="form-control" required autofocus>
        </div>
      </div>
      <br>
      <div class="form-group row" style="padding-left: 80px;">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Maaş<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" name="tBox_Maas" class="form-control" required autofocus>
        </div>
      </div>
      <br>
      <!-- Doğum Tarihi Alma -->
      <div class="form-group row" style="padding-left: 80px;">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Doğum Tarihi<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="date" name="tBox_dogumTarihi" class="form-control" required autofocus>
        </div>
      </div>
      <br>
      <!-- Cinsiyet Seçme -->
      <div class="form-group row" style="padding-left: 80px;">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Cinsiyet<span class="required">*</span></label>
      <div class="col-md-6 col-sm-6 ">
      <select class="form-control" name="cinsiyet" id="cinsiyet">
        <option>Seçiniz..</option>
        <?php

        $cinsiyetAdi='cinsiyetAdi';
        $cinsiyetID='cinsiyetID';

        $cinsiyetQuery = mysqli_query($baglan, "SELECT * FROM cinsiyet");
        if(mysqli_num_rows($cinsiyetQuery)!=0)
        {
          while($read_cinsiyet = mysqli_fetch_array($cinsiyetQuery))	
          {
            echo "<option value='$read_cinsiyet[$cinsiyetID]'>$read_cinsiyet[$cinsiyetAdi]</option>";
          }
        }
        ?>
      </select>
    </div>
    </div><br>
    <!-- Yetki Seçme -->
    <div class="form-group row" style="padding-left: 80px;">
      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Yetki<span class="required">*</span></label>
      <div class="col-md-6 col-sm-6 ">
        <select class="form-control" name="yetki" id="yetki">
          <option>Seçiniz..</option>
          <?php

        $yetkiAdi='yetkiAdi';
        $yetkiID='yetkiID';

        $yetkiQuery = mysqli_query($baglan, "SELECT * FROM yetkiler");
        if(mysqli_num_rows($yetkiQuery)!=0)
        {
          while($read_yetki = mysqli_fetch_array($yetkiQuery))	
          {
            echo "<option value='$read_yetki[$yetkiID]'>$read_yetki[$yetkiAdi]</option>";
          }
        }
        ?>
      </select>
     </div>
   </div></br>
    <!-- İşe Giriş Tarihi Alma -->
    <div class="form-group row" style="padding-left: 80px;">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">İşe Giriş<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="date" name="tBox_iseGiris" class="form-control" required autofocus>
        </div>
      </div>
      <br>
  </div>

  <!-- 3. Adım -->
  <div id="step-3"><br><br>

    <!-- Adres Seçimi -->

    <!-- İl Seçme -->
    <div class="form-group row" style="padding-left: 80px;">
      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">İl Seçiniz<span class="required">*</span></label>
      <div class="col-md-6 col-sm-6 ">
        <select class="form-control" name="ilSec" style="width:766px;" id="ilSec">
          <option>Seçiniz..</option>
          <?php

          $ilAdi='ilAdi';
          $ilID='ilID';

          $ilQuery = mysqli_query($baglan, "SELECT * FROM iller");
          if(mysqli_num_rows($ilQuery)!=0)
          {
            while($read_iller = mysqli_fetch_array($ilQuery))	
            {
              echo "<option value='$read_iller[$ilID]'>$read_iller[$ilAdi]</option>";
            }
          }
          ?>
        </select>
      </div>
    </div>

    <br>
    <!-- İlçe Seçme -->
    <div class="form-group row" style="padding-left: 80px;">
      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">İlçe Seçiniz<span class="required">*</span></label>
      <div class="col-md-6 col-sm-6 ">
        <select class="form-control" name="ilceSec" style="width:766px;" id="ilceSec"">
        
          <option>Seçiniz..</option>													
          <?php
          
          $ilceAdi='ilceAdi';
          $ilceID='ilceID';

          $ilceQuery = mysqli_query($baglan, "SELECT ilceler.ilceID,ilceler.ilceAdi FROM iller,ilceler WHERE iller.ilID = ilceler.ilID LIMIT 100");
          if(mysqli_num_rows($ilceQuery)!=0)
          {
            while($read_ilceler = mysqli_fetch_array($ilceQuery))	
            {
              echo "<option value='$read_ilceler[$ilceID]'>$read_ilceler[$ilceAdi]</option>";
            }
          }
          ?>
        </select>
      </div>
    </div>
    <br>

    <!-- Semt Seçme -->
    <div class="form-group row" style="padding-left: 80px;">
      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Semt Seçiniz<span class="required">*</span></label>
      <div class="col-md-6 col-sm-6 ">
        <select class="form-control" name="semtSec" style="width:766px;"  id="semtSec">
        
          <option>Seçiniz..</option>													
          <?php
          
          $semtAdi='semtAdi';
          $semtID='semtID';

          $semtQuery = mysqli_query($baglan, "SELECT semtler.semtID,semtler.semtAdi FROM semtler,ilceler WHERE semtler.ilceID = ilceler.ilceID LIMIT 100");
          if(mysqli_num_rows($semtQuery)!=0)
          {
            while($read_semtler = mysqli_fetch_array($semtQuery))	
            {
              echo "<option value='$read_semtler[$semtID]'>$read_semtler[$semtAdi]</option>";
            }
          }
          ?>
          
        </select>
      </div>
    </div>
    <br>
    <!-- Mahalle Seçme -->
    <div class="form-group row" style="padding-left: 80px;">
      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Mahalle Seçiniz<span class="required">*</span></label>
      <div class="col-md-6 col-sm-6 ">
        <select class="form-control" name="mahalleSec" style="width:766px;"  id="mahalleSec">
        
          <option>Seçiniz..</option>													
          <?php
          
          $mahalleAdi='mahalleAdi';
          $mahalleID='mahalleID';

          $mahalleQuery = mysqli_query($baglan, "SELECT mahalleler.mahalleID,mahalleler.mahalleAdi FROM semtler,mahalleler WHERE semtler.semtID = mahalleler.semtID LIMIT 100");
          if(mysqli_num_rows($mahalleQuery)!=0)
          {
            while($read_mahalleler = mysqli_fetch_array($mahalleQuery))	
            {
              echo "<option value='$read_mahalleler[$mahalleID]'>$read_mahalleler[$mahalleAdi]</option>";
            }
          }
          ?>
          
        </select>
      </div>
    </div>
    <br>
  <!-- Ad Alma -->
  <div class="form-group row " style="padding-left: 80px;">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Ek Açıklamalar<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" name="adresAciklama" class="form-control" required autofocus>
        </div>
      </div>
      <br>
  <!-- Sözleşme -->
  <div class="form-group row" style="padding-left: 100px;">
    
                    <div class="custom-checkbox custom-control">
                      
                    </div>
                    

  </div><br>
  <div class="form-group row" style="width:80%; padding-left:25%;"><br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;  <input type="checkbox" name="agree" id="agree" class="custom-control-input" required>
                      <label for="agree" class="custom-control-label"><a href="#">Kullanıcı</a> ve <a href="#">Gizlilik</a> Sözleşmesini Okudum ve Kabul Ediyorum</label>
                      <div class="invalid-feedback">
                      Sözleşmeyi Kabul Etmek Zorunludur
                      </div>
      </div>
      <input type="submit" name="kaydetPersonel" class="btn btn-primary btn-block" value="Personel Kaydet" style="width:500px; margin-left:37%;"> 

  </div>
  </form></div>
<!-- End SmartWizard Content -->

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
<script src="js/my-login.js"></script>

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
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Custom Scripts Bitis -->
<script>
  $(document).ready(function() {
  $('#ilSec').select2();
  });
</script>

<script>
  $(document).ready(function() {
  $('#ilceSec').select2();
  });
</script>

<script>
  $(document).ready(function() {
  $('#semtSec').select2();
  });
</script>

<script>
  $(document).ready(function() {
  $('#mahalleSec').select2();
  });
</script>


  </body>
</html>
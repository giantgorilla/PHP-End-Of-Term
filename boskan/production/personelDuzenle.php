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

if ($yetkiSeviyesi != 1):
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
	  <link rel="stylesheet" type="text/css" href="css/my-register.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

<?php

$personel_ID = $_GET['personel_ID'];


$yeni_Ad = $_POST["yeni_Ad"];
$yeni_Soyad = $_POST["yeni_Soyad"];
$yeni_eMail = $_POST["yeni_eMail"];

$yeni_Sifre = $_POST["yeni_Sifre"];
$yeni_SifreTekrar = $_POST["yeni_SifreTekrar"];
$yeni_SifreMD5 = md5($yeni_Sifre);

$yeni_DogumTarihi = $_POST["yeni_DogumTarihi"];
$yeni_TelNo = $_POST["yeni_TelNo"];
$yeni_Maas = $_POST["yeni_Maas"];
$yeni_Cinsiyet = $_POST["yeni_Cinsiyet"];
$yeni_Yetki = $_POST["yeni_Yetki"];
$yeni_iseGiris = $_POST["yeni_iseGiris"];

$yeni_il = $_POST["yeni_ilSec"];
$yeni_ilce = $_POST["yeni_ilceSec"];
$yeni_semt = $_POST["yeni_semtSec"];
$yeni_mahalle = $_POST["yeni_mahalleSec"];
$yeni_adresAciklama = $_POST["yeni_adresAciklama"];



if ($_POST['duzenlePersonel']) {
  if (!$yeni_Ad || !$yeni_Soyad || !$yeni_eMail || !$yeni_TelNo || !$yeni_Maas || !$yeni_DogumTarihi || !$yeni_Cinsiyet || !$yeni_iseGiris || !$yeni_Yetki) 
  {
    echo "<script type='text/JavaScript'>
    alert('Veri Eksik Geliyor');
  </script>";
  } else {
    if ($yeni_Sifre != $yeni_SifreTekrar) {
      echo "<script type='text/JavaScript'>
              alert('Girilen Şifreler Uyumsuz');
            </script>";

    } else {


      $girisBilgiGuncelle = mysqli_query($baglan, "UPDATE girisbilgileri
                                                 SET girisbilgileri.email = '$yeni_eMail',
                                                 girisbilgileri.password = '$yeni_SifreMD5'
                                                 WHERE girisbilgileri.girisBilgiID = (
                                                 SELECT personel.girisBilgiID
                                                 FROM personel
                                                 WHERE personel.personel_ID = '$personel_ID'
                                                 );");

      $adresBilgiGuncelle = mysqli_query($baglan, "UPDATE adres
                                                  SET adres.ilID = '$yeni_il',
                                                  adres.ilceID = '$yeni_ilce',
                                                  adres.semtID = '$yeni_semt',
                                                  adres.mahalleID = '$yeni_mahalle',
                                                  adres.ekAciklama = '$yeni_adresAciklama'

                                                  WHERE adres.adresID = (
                                                  SELECT personel.adresID
                                                  FROM personel
                                                  WHERE personel.personel_ID = '$personel_ID'
                                                    );");
      $personelGuncelle = mysqli_query($baglan, "UPDATE personel
                                                SET personel.adi = 			    ('$yeni_Ad'),
                                                    personel.soyadi = 	  	('$yeni_Soyad'),
                                                    personel.tel_No = 	  	('$yeni_TelNo'),
                                                    personel.maas = 		    ('$yeni_Maas'),
                                                    personel.dogum_Tarihi = ('$yeni_DogumTarihi'),
                                                    personel.cinsiyetID = 	('$yeni_Cinsiyet'),
                                                    personel.ise_Giris =  	('$yeni_iseGiris'),
                                                    personel.yetkiID = 	  	('$yeni_Yetki')
                                                WHERE personel.personel_ID = '$personel_ID'");
                                                
      if ($personelGuncelle && $adresBilgiGuncelle && $girisBilgiGuncelle) {
        
        header('Location:duzenlemeGecis.php');
        #update işleminden sonra güncel verilerin görülebilmesi amacıyla yenileme yapıyoruz.																
      } else {
        echo "Kullanıcı bilgileri güncellenirken bir sıkıntı oluştu!";
        echo "<script type='text/JavaScript'>
        alert('Kullanıcı bilgileri güncellenirken bir sıkıntı oluştu!');
        </script>";
      }
    }
  }
}
else
{
  $personelInfo=mysqli_query($baglan,"SELECT * FROM personel,adres,girisbilgileri,yetkiler,cinsiyet WHERE personel.personel_ID = '$personel_ID' AND personel.girisBilgiID = girisbilgileri.girisBilgiID AND personel.adresID = adres.adresID AND personel.yetkiID = yetkiler.yetkiID AND personel.cinsiyetID = cinsiyet.cinsiyetID GROUP BY personel.personel_ID;");
  $readPersonelInfo = mysqli_fetch_array($personelInfo);

  $eski_adi = $readPersonelInfo["adi"];
  $eski_soyadi = $readPersonelInfo["soyadi"];
  $eski_tel_No = $readPersonelInfo["tel_No"];
  $eski_maas = $readPersonelInfo["maas"];
  $eski_cinsiyetID = $readPersonelInfo["cinsiyetID"];
  $eski_cinsiyetAdi = $readPersonelInfo["cinsiyetAdi"];
  $eski_dogum_Tarihi = $readPersonelInfo["dogum_Tarihi"];
  $eski_ise_Giris = $readPersonelInfo["ise_Giris"];
  $eski_yetkiID = $readPersonelInfo["yetkiID"];
  $eski_yetkiAdi = $readPersonelInfo["yetkiAdi"];
  $eski_girisBilgiID = $readPersonelInfo["girisBilgiID"];
  $eski_ilID = $readPersonelInfo["ilID"];
  $eski_ilAdi = $readPersonelInfo["ilAdi"];
  $eski_ilceID = $readPersonelInfo["ilceID"];
  $eski_ilceAdi = $readPersonelInfo["ilceAdi"];
  $eski_semtID = $readPersonelInfo["semtID"];
  $eski_semtAdi = $readPersonelInfo["semtAdi"];
  $eski_mahalleID = $readPersonelInfo["mahalleID"];
  $eski_mahalleAdi = $readPersonelInfo["mahalleAdi"];
  $eski_ekAciklama = $readPersonelInfo["ekAciklama"];
  $eski_email = $readPersonelInfo["email"];
  $eski_sifre = md5($readPersonelInfo["password"]);
  

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
      <input type="text" name="yeni_Ad" class="form-control" value="<?php echo $eski_adi; ?>" required autofocus>
      </div>
    </div>
    <br>
    <!-- Soyad Alma -->
    <div class="form-group row" style="padding-left: 80px;">
      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Soyadnınız<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 ">
      <input type="text" name="yeni_Soyad" class="form-control" value="<?php echo $eski_soyadi; ?>" required autofocus>
      </div>
    </div>
    <br>

      <!-- Mail Adresi Alma -->
      <div class="form-group row" style="padding-left: 80px;">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email1">E Posta<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="email" name="yeni_eMail" class="form-control" value="<?php echo $eski_email; ?>" required>
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
        <input type="password" name="yeni_Sifre" class="form-control" value="<?php echo $eski_sifre; ?>" required data-eye>
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
        <input type="password" name="yeni_SifreTekrar" class="form-control" value="<?php echo $eski_sifre; ?>" required data-eye>
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
        <input type="tel" name="yeni_TelNo" class="form-control" value="<?php echo $eski_tel_No; ?>" required autofocus>
        </div>
      </div>
      <br>
      <div class="form-group row" style="padding-left: 80px;">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Maaş<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" name="yeni_Maas" class="form-control" value="<?php echo $eski_maas; ?>" required autofocus>
        </div>
      </div>
      <br>
      <!-- Doğum Tarihi Alma -->
      <div class="form-group row" style="padding-left: 80px;">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Doğum Tarihi<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="date" name="yeni_DogumTarihi" class="form-control" value="<?php echo $eski_dogum_Tarihi; ?>"  required autofocus>
        </div>
      </div>
      <br>
      <!-- Cinsiyet Seçme -->
      <div class="form-group row" style="padding-left: 80px;">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Cinsiyet<span class="required">*</span></label>
      <div class="col-md-6 col-sm-6 ">
      <select class="form-control" name="yeni_Cinsiyet" id="yeni_Cinsiyet">
        <option value="<?php echo $eski_cinsiyetID; ?>"selected><?php echo $eski_cinsiyetAdi; ?></option>
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
        <select class="form-control" name="yeni_Yetki" id="yeni_Yetki">
        <option value="<?php echo $eski_yetkiID; ?>"selected><?php echo $eski_yetkiAdi; ?></option>
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
        <input type="date" name="yeni_iseGiris" class="form-control"  value="<?php echo $eski_ise_Giris; ?>" required autofocus>
        </div>
      </div>
      <br>
  </div>

  <!-- 3. Adım -->
  <div id="step-3"><br><br>

    <!-- Adres Seçimi -->

    <?php

    $seciliSehirQuery = mysqli_query($baglan, "SELECT iller.ilID,iller.ilAdi FROM adres, iller, personel
                                                  WHERE adres.adresID = personel.adresID
                                                  AND adres.ilID = iller.ilID
                                                  AND personel.personel_ID = $personel_ID");
    $readSeciliSehir = mysqli_fetch_array($seciliSehirQuery);
//
    $seciliIlceQuery = mysqli_query($baglan, "SELECT ilceler.ilceID,ilceler.ilceAdi FROM adres, iller,ilceler, personel
                                              WHERE adres.adresID = personel.adresID
                                              AND adres.ilceID = ilceler.ilceID
                                              AND personel.personel_ID = $personel_ID");
    $readSeciliIlce = mysqli_fetch_array($seciliIlceQuery);
//
    $seciliSemtQuery = mysqli_query($baglan, "SELECT semtler.semtID,semtler.semtAdi FROM adres, semtler,ilceler, personel
                                              WHERE adres.adresID = personel.adresID
                                              AND adres.semtID = semtler.semtID
                                              AND personel.personel_ID = $personel_ID");
    $readSeciliSemt = mysqli_fetch_array($seciliSemtQuery);
//
    $seciliMahalleQuery = mysqli_query($baglan, "SELECT mahalleler.mahalleID,mahalleler.mahalleAdi FROM adres, semtler,mahalleler, personel
                                              WHERE adres.adresID = personel.adresID
                                              AND adres.mahalleID = mahalleler.mahalleID
                                              AND personel.personel_ID = $personel_ID");
    $readSeciliMahalle = mysqli_fetch_array($seciliMahalleQuery);
    
    ?>
    <!-- İl Seçme -->
    <div class="form-group row" style="padding-left: 80px;">
      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">İl Seçiniz<span class="required">*</span></label>
      <div class="col-md-6 col-sm-6 ">
        <select class="form-control" name="yeni_ilSec" style="width:766px;" id="yeni_ilSec">
        <option value="<?php echo $readSeciliSehir['ilID']; ?>"selected><?php echo $readSeciliSehir['ilAdi'];; ?></option>
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
        <select class="form-control" name="yeni_ilceSec" style="width:766px;" id="yeni_ilceSec"">
        
        <option value="<?php echo $readSeciliIlce['ilceID']; ?>"selected><?php echo $readSeciliIlce['ilceAdi'];; ?></option>					
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
        <select class="form-control" name="yeni_semtSec" style="width:766px;"  id="yeni_semtSec">
        
        <option value="<?php echo $readSeciliSemt['semtID']; ?>"selected><?php echo $readSeciliSemt['semtAdi'];; ?></option>												
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
    <?php
          
          $seciliMahalleQuery = mysqli_query($baglan, "SELECT mahalleler.mahalleID,mahalleler.mahalleAdi 
          FROM personel,adres,iller,ilceler,semtler,mahalleler 
          WHERE semtler.semtID = mahalleler.semtID 
          AND semtler.semtID = ilceler.ilceID
          AND ilceler.ilceID = iller.ilID
          AND adres.adresID = personel.adresID
          AND personel.personel_ID = '$personel_ID';");
          $readSeciliMahalle = mysqli_fetch_array($seciliMahalleQuery);
          ?>
    <!-- Mahalle Seçme -->
    <div class="form-group row" style="padding-left: 80px;">
      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Mahalle Seçiniz<span class="required">*</span></label>
      <div class="col-md-6 col-sm-6 ">
        <select class="form-control" name="yeni_mahalleSec" style="width:766px;"  id="yeni_mahalleSec">
        
        <option value="<?php echo $readSeciliMahalle['mahalleID']; ?>"selected><?php echo $readSeciliMahalle['mahalleAdi'];; ?></option>					
          <?php
          
          $seciliMahalleQuery = mysqli_query($baglan, "SELECT mahalleler.mahalleID,mahalleler.mahalleAdi 
          FROM personel,adres,iller,ilceler,semtler,mahalleler 
          WHERE semtler.semtID = mahalleler.semtID 
          AND semtler.semtID = ilceler.ilceID
          AND ilceler.ilceID = iller.ilID
          AND adres.adresID = personel.adresID
          AND personel.personel_ID = '$personel_ID';");
          $readSeciliMahalle = mysqli_fetch_array($seciliMahalleQuery);

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
  <!-- Açıklama Alma -->
  <div class="form-group row " style="padding-left: 80px;">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Ek Açıklamalar<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" name="yeni_adresAciklama" class="form-control" value="<?php echo $eski_ekAciklama; ?>" required autofocus>
        </div>
      </div>
      <br>
  <!-- Sözleşme -->
  <div class="form-group row" style="padding-left: 100px;">
    
                    <div class="custom-checkbox custom-control">
                      
                    </div>
                    

  </div><br>
  <div class="form-group row" style="width:80%; padding-left:25%;"><br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;  <input type="checkbox" name="agree" id="agree" class="custom-control-input" required=""></br>
  <label for="agree" class="custom-control-label"><a href="#">Personelin</a> <a href="#">Sözleşmeyi </a>Okuduğunu ve Kabul Ettiğini Onaylıyorum<br></br></label></br></br>
                      <div class="invalid-feedback">
                      Sözleşmeyi Kabul Etmek Zorunludur
                      </div>
      </div>
      <input type="submit" name="duzenlePersonel" class="btn btn-primary btn-block" value="Personel Güncelle" style="width:500px; margin-left:37%;"> 

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
  $('#yeni_ilSec').select2();
  });
</script>

<script>
  $(document).ready(function() {
  $('#yeni_ilceSec').select2();
  });
</script>

<script>
  $(document).ready(function() {
  $('#yeni_semtSec').select2();
  });
</script>

<script>
  $(document).ready(function() {
  $('#yeni_mahalleSec').select2();
  });
</script>


  </body>
</html><?php
ob_end_flush();
?>
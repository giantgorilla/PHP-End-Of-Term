<?php

require "page_layouts/settings.php"; // require, include gibi belirtilen dosyayı kodun yazıldığı dosya içerisine eklemek için kullanılır. Ama include gibi uyarı vermek yerine hata verir ve kodun çalışmasını durdurur. require fonksiyonunun da kullanımı include fonksiyonu ile aynıdır.
include_once 'connection.php';
ob_start(); // yönlendirmelerde ihtiyacımız var. sayfa yönlendirmeleri


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf8_turkish_ci">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Kayıt Ol</title>
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

</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
			<div class="card-wrapper">
				<br>
					<br><br>
					<div class="card-body">
					<a href ="mainPage.php">
					<h2 class="card-title" style="text-align:center; font-family: 'Montserrat', sans-serif; font-weight: 600;">
					<img src="images/logo_black.png" width="350px"/>
					</h2>
					</a>
					<br>
					</div>
					
					<div class="card fat">

<?php

// $kullaniciAdi = $_POST["kullaniciAdi"];
// $kullaniciSoyadi = $_POST["kullaniciSoyadi"];
$ad = $_POST["tBox_Ad"];
$soyad = $_POST["tBox_Soyad"];
$email = $_POST["tBox_Email"];

$sifre = $_POST["tBox_Sifre"];
$sifreTekrar = $_POST["tBox_SifreTekrar"];
$sifre_md5 = md5($sifre);

$dogumTarihi = $_POST["tBox_dogumTarihi"];
$telNo = $_POST["tBox_telNo"];
$cinsiyet = $_POST["cinsiyet"];

$il = $_POST["ilSec"];
$ilce = $_POST["ilceSec"];
$semt = $_POST["semtSec"];
$mahalle = $_POST["mahalleSec"];
$adresAciklama = $_POST["adresAciklama"];

// echo "$ad <br>";
// echo "$soyad <br>";
// echo "$email <br>";
// echo "$sifre <br>";
// echo "$sifreTekrar <br>";
// echo "$dogumTarihi <br>";
// echo "$telNo <br>";
// echo "$cinsiyet <br>";
// echo "$il<br>";
// echo "$ilce<br>";
// echo "$semt<br>";
// echo "$mahalle<br>";




if($_POST){
  
  if(!$ad || !$soyad || !$email || !$sifre || !$sifreTekrar || !$telNo || !$dogumTarihi || !$cinsiyet || !$il || !$ilce || !$semt || !$mahalle)
  {
    echo "Lütfen Zorunlu Alanları Doldurunuz !";
  }
  else
  {
    if($sifre != $sifreTekrar)
    {
      echo "<script type='text/JavaScript'>
              // document.getElementById('sifreHata').innerHTML = 'TESTASD';
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

              $musteriEkle = mysqli_query($baglan, "INSERT INTO musteri (adi,soyadi,cinsiyetID,dogum_Tarihi,tel_No,adresID,girisBilgiID) 
                                              VALUES ('$ad','$soyad','$cinsiyet','$dogumTarihi','$telNo','$adresID','$girisBilgiID')
                                              ");
              
              if($musteriEkle)
              {
                echo "Kayıt Başarılı"."<br>"."5 Saniye İçerisine Yönlendirileceksiniz...";
                header('Location:kayitGecis.php');
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

<!-- Smart Wizard --><br><br><br>
					
<div id="wizard" class="form_wizard wizard_horizontal">
<br>
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
    <!-- Ad Alma -->
    <div class="form-group row " style="padding-left: 80px;">
      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Adınız<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 ">
      <input type="text" name="tBox_Ad" class="form-control" required autofocus>
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
    <!-- Numara Alma -->
    <div class="form-group row" style="padding-left: 80px;">
      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Telefon Numara<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 ">
      <input type="tel" name="tBox_telNo" class="form-control" required autofocus>
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
    <select class="form-control" name="cinsiyet" id="cinsiyet" style="width:280px;" ondrop=""">
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
  </div>
  </div>

  <!-- 3. Adım -->
  <div id="step-3"><br><br>

  <!-- Adres Seçimi -->

  <!-- İl Seçme -->
  <div class="form-group row" style="padding-left: 80px;">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">İl Seçiniz<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 ">
      <select class="form-control" name="ilSec" id="ilSec" style="width:300px;" onchange="ilSecildi()" ondrop=""">
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
      <select class="form-control" name="ilceSec" id="ilceSec" style="width:300px;">
      
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
      <select class="form-control" name="semtSec" id="semtSec" style="width:300px;">
      
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
        <select class="form-control" name="mahalleSec" id="mahalleSec" style="width:300px;">
        
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
    <input type="text" style="width:300px;" name="adresAciklama" class="form-control" required autofocus>
    </div>
  </div>
  <br>
  <!-- Sözleşme -->
  <div class="form-group row" style="padding-left: 240px;">
    
                    <div class="custom-checkbox custom-control">
                      <input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
                      <label for="agree" class="custom-control-label"><a href="#"> Kullanıcı</a> ve <a href="#">Gizlilik</a> Sözleşmesini<br> Okudum ve Kabul Ediyorum</label>
                      <div class="invalid-feedback">
                      Sözleşmeyi Kabul Etmek Zorunludur
                      </div>
                    </div>
                    

  </div>
  <br>
      <div class="form-group row" style="padding-left: 13%;">
        <div class="col-md-6 col-sm-6 ">

									<button type="submit" class="btn btn-primary btn-block">
										Kayıt Ol
									</button>               
        </div> 
      </div
</form> 
</div>
    </div>
<!-- End SmartWizard Content -->

					</div>

					<div class="footer">
						Copyright &copy; 2022 &mdash; BOSKAN
            <div id="demo"></div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	

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
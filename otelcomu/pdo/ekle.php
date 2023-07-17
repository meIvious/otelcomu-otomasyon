<?php
// include database connection file
include("../fonksiyonlar/fonksiyon.php");
require_once'veritabanibaglantisi.php';
if(isset($_POST['ekle']))
{

// Posted Values
session_start();
$uyeid=$_SESSION['id'];
$oda="2";
$ad=$_POST['ad'];
$soyad=$_POST['soyad'];
$telno=$_POST['telno'];
$email=$_POST['email'];
$odasayisi=$_POST['odasayisi'];
$kisisayisi=$_POST['kisisayisi'];
$giristarihi=$_POST['giristarihi'];
$cikistarihi=$_POST['cikistarihi'];


// Query for Insertion
$sql="INSERT INTO rezervasyonbilgileri(uyeid,odaid,Ad,Soyad,Telno,Email,Odasayisi,Kisisayisi,Giristarihi,Cikistarihi) VALUES(:yedi,:on,:bir,:iki,:uc,:dort,:bes,:alti,:sekiz,:dokuz)";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':yedi',$uyeid,PDO::PARAM_STR);
$query->bindParam(':on',$oda,PDO::PARAM_STR);
$query->bindParam(':bir',$ad,PDO::PARAM_STR);
$query->bindParam(':iki',$soyad,PDO::PARAM_STR);
$query->bindParam(':uc',$telno,PDO::PARAM_STR);
$query->bindParam(':dort',$email,PDO::PARAM_STR);
$query->bindParam(':bes',$odasayisi,PDO::PARAM_STR);
$query->bindParam(':alti',$kisisayisi,PDO::PARAM_STR);
$query->bindParam(':sekiz',$giristarihi,PDO::PARAM_STR);
$query->bindParam(':dokuz',$cikistarihi,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
$lastInsertId = $dbh->lastInsertId();
$sql="INSERT INTO rapor(rezerveid,odaid) VALUES(:bir,:iki)";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':bir',$lastInsertId,PDO::PARAM_STR);
$query->bindParam(':iki',$oda,PDO::PARAM_STR);
// Query Execution
$query->execute();


if($lastInsertId)
{
// Message for successfull insertion
echo "<script>alert('Kayıt Başarılı');</script>";
echo "<script>window.location.href='rezervasyonkontrol.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Kayıt Başarısız.Tekrar deneyin');</script>";
echo "<script>window.location.href='rezervasyonkontrol.php'</script>";
}
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link href="../dosyalar/font-awesome/css/all.css" rel="stylesheet">
<link href="../dosyalar/font-awesome/webfonts" rel="stylesheet">
</head>
<body>
<main class="my-5">
<div class="container">
<div class="row">
<div class="col-md-12">
<h4 class='page-header text-center'><i class="fas fa-edit"></i> Rezervasyon Bilgilerini Girin</h4><hr>

<form name="kayitekleme" method="post">
    <div class="form-row">
  <div class="form-group col-md-6">
  <label>Ad</label>
  <input type="text" name="ad"   class="form-control" autocomplete="off" onkeypress='return event.keyCode >= 65 && event.keyCode <= 122' required>
  </div>

  <div class="form-group col-md-6">
  <label>Soyad</label>
  <input type="text" name="soyad"   class="form-control" autocomplete="off" onkeypress='return event.keyCode >= 65 && event.keyCode <= 122' required>
  </div>

  <div class="form-group col-md-6">
  <label>Telefon Numarası</label>
  <input type="text" name="telno" class="form-control" autocomplete="off" maxlength="10"   maxlength="11" class="form-control" onkeypress='return event.keyCode >= 48 && event.keyCode <= 57' required>
  </div>
  <div class="form-group col-md-6">
  <label>Email</label>
  <input type="email" name="email" autocomplete="off" class="form-control" required>
  </div>

  <div class="form-group col-md-6">
    <label>Oda  Sayısı</label>
    <select   name="odasayisi" class="form-control" autocomplete="off" onkeypress='return event.keyCode >= 48 && event.keyCode <= 57' required>
    <option selected></option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    </select>
    </div>

    <div class="form-group col-md-6">
      <label>Kişi  Sayısı</label>
      <select name="kisisayisi" class="form-control" autocomplete="off" onkeypress='return event.keyCode >= 48 && event.keyCode <= 57' required>
      <option selected></option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      </select>
      </div>

      <div class="form-group col-md-6">
      <label>Giriş Tarihi</label>
      <input type="date" name="giristarihi"  class="form-control" required>
      </div>

      <div class="form-group col-md-6">
      <label>Çıkış Tarihi</label>
      <input type="date" name="cikistarihi"  class="form-control" required>
      </div>

    </div><br><br><br>
      <div class="form-group text-center">
      <input type="submit" name="ekle" class="btn btn-success"  value="Rezervasyon Yap">
      </div>
      </form>

  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- textaddneww -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:15px"
     data-ad-client="ca-pub-8906663933481361"
     data-ad-slot="3318815534"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
</div>
</div>
</main>
</body>
</html>

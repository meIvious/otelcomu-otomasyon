<?php
// include database connection file
include("../fonksiyonlar/fonksiyon.php");
require_once'veritabanibaglantisi.php';
if(isset($_POST['guncelle']))
{
// Get the kullanici_id
$kullanici_id=intval($_GET['id']);
// Posted Values
$ad=$_POST['ad'];
$soyad=$_POST['soyad'];
$telno=$_POST['telno'];
$email=$_POST['email'];
$odasayisi=$_POST['odasayisi'];
$kisisayisi=$_POST['kisisayisi'];
$giristarihi=$_POST['giristarihi'];
$cikistarihi=$_POST['cikistarihi'];

// Query for Query for Updation
$sql="update rezervasyonbilgileri set Ad=:bir,Soyad=:iki,Telno=:uc,Email=:dort,Odasayisi=:bes,Kisisayisi=:alti,Giristarihi=:sekiz,Cikistarihi=:dokuz where id=:uid";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':bir',$ad,PDO::PARAM_STR);
$query->bindParam(':iki',$soyad,PDO::PARAM_STR);
$query->bindParam(':uc',$telno,PDO::PARAM_STR);
$query->bindParam(':dort',$email,PDO::PARAM_STR);
$query->bindParam(':bes',$odasayisi,PDO::PARAM_STR);
$query->bindParam(':alti',$kisisayisi,PDO::PARAM_STR);
$query->bindParam(':sekiz',$giristarihi,PDO::PARAM_STR);
$query->bindParam(':dokuz',$cikistarihi,PDO::PARAM_STR);
$query->bindParam(':uid',$kullanici_id,PDO::PARAM_STR);

// Query Execution
$query->execute();
// Mesage after updation
echo "<script>alert('Rezervasyonunuz Güncellendi');</script>";
// Code for redirection
echo "<script>window.location.href='rezervasyonkontrol.php'</script>";
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
<h4 class='page-header text-center'><i class="fas fa-edit"></i> Rezervasyon Bilgilerini Güncelleyin</h4><hr>

<?php
// Get the kullanici_id
$kullanici_id=intval($_GET['id']);
$sql = "SELECT Ad,Soyad,Telno,Email,Odasayisi,Kisisayisi,id from rezervasyonbilgileri where id=:uid";
//Prepare the query:
$query = $dbh->prepare($sql);
//Bind the parameters
$query->bindParam(':uid',$kullanici_id,PDO::PARAM_STR);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization
$cnt=1;
if($query->rowCount() > 0)
{
//In case that the query returned at least one record, we can echo the records within a foreach loop:
foreach($results as $result)
{
?>

<form name="kayitekleme" method="post">
    <div class="form-row">
  <div class="form-group col-md-6">
  <label>Ad</label>
  <input type="text" name="ad"  value="<?php echo htmlentities($result->Ad);?>"  class="form-control" onkeypress='return event.keyCode >= 65 && event.keyCode <= 122' required>
  </div>

  <div class="form-group col-md-6">
  <label>Soyad</label>
  <input type="text" name="soyad" value="<?php echo htmlentities($result->Soyad);?>"  class="form-control" onkeypress='return event.keyCode >= 65 && event.keyCode <= 122' required>
  </div>

  <div class="form-group col-md-6">
  <label>Telefon Numarası</label>
  <input type="text" name="telno" value="<?php echo htmlentities($result->Telno);?>" class="form-control" maxlength="10"   maxlength="11" class="form-control" onkeypress='return event.keyCode >= 48 && event.keyCode <= 57' required>
  </div>
  <div class="form-group col-md-6">
  <label>Email</label>
  <input type="email" name="email" value="<?php echo htmlentities($result->Email);?>" class="form-control" required>
  </div>

  <div class="form-group col-md-6">
    <label>Oda  Sayısı</label>
    <select   name="odasayisi" value="<?php echo htmlentities($result->Odasayisi);?>" class="form-control" onkeypress='return event.keyCode >= 48 && event.keyCode <= 57' required>
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
      <select name="kisisayisi" value="<?php echo htmlentities($result->Kisisayisi);?>" class="form-control" onkeypress='return event.keyCode >= 48 && event.keyCode <= 57' required>
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
      <input type="date" name="giristarihi" value="<?php echo htmlentities($result->Giristarihi);?>" class="form-control" required>
      </div>

      <div class="form-group col-md-6">
      <label>Çıkış Tarihi</label>
      <input type="date" name="cikistarihi"  value="<?php echo htmlentities($result->Cikistarihi);?>" class="form-control" required>
      </div>
    </div>

<?php }} ?>
<br><br>
  <div class="form-group text-center">
  <input type="submit" name="guncelle" class="btn btn-warning"  value="Rezervasyonu Güncelle">
  </div>
  </form>
	</div>
</div>
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

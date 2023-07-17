<?php
// include database connection file
include("../fonksiyonlar/fonksiyon.php");
require_once'veritabanibaglantisi.php';

// Code for record deletion
if(isset($_REQUEST['del']))
{
//Get row id
$uid=intval($_GET['del']);
//Qyery for deletion
$sql = "delete from rezervasyonbilgileri WHERE  id=:id";
// Prepare query for execution
$query = $dbh->prepare($sql);
// bind the parameters
$query-> bindParam(':id',$uid, PDO::PARAM_STR);
// Query Execution
$query -> execute();
// Mesage after updation
echo "<script>alert('Kayıt Silindi.');</script>";
// Code for redirection
echo "<script>window.location.href='rezervasyonkontrol.php'</script>";
}


if(isset($_REQUEST['del']))
{
//Get row id
$uid=intval($_GET['del']);
//Qyery for deletion
$sql = "delete from rapor WHERE  rezerveid=:id";
// Prepare query for execution
$query = $dbh->prepare($sql);
// bind the parameters
$query-> bindParam(':id',$uid, PDO::PARAM_STR);
// Query Execution
$query -> execute();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <link href="../dosyalar/font-awesome/css/all.css" rel="stylesheet">
  <link href="../dosyalar/font-awesome/webfonts" rel="stylesheet">
<style>
body {
  background-color:#a9a9a9;

}
</style>
</head>
<body>
<main class="my-5">
<div class="container">
<div class="row">
<div class="col-md-12">
<h4 class='page-header text-center'><i class="fas fa-edit"></i> <strong>Rezervasyon Bilgilerinini Kontrol Edin</strong></h4>
<div class="table-responsive">
<table id="mytable" class="table table-bordred table-striped">
<thead>
<th>#</th>
<th>AD</th>
<th>SOYAD</th>
<th>TELNO</th>
<th>EMAİL</th>
<th>Oda Sayısı</th>
<th>Kişi Sayısı</th>
<th>Giriş Tarihi</th>
<th>Çıkış Tarihi</th>
<th>Güncelle</th>
<th>Sil</th>
</thead>
<tbody>

<?php
session_start();
$uyeid=$_SESSION['id'];
$sql = "SELECT Ad,Soyad,Telno,Email,Odasayisi,Kisisayisi,Giristarihi,Cikistarihi,id from rezervasyonbilgileri where uyeid=$uyeid";
//Prepare the query:
$query = $dbh->prepare($sql);
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
    <tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td><?php echo htmlentities($result->Ad);?></td>
    <td><?php echo htmlentities($result->Soyad);?></td>
    <td><?php echo htmlentities($result->Telno);?></td>
    <td><?php echo htmlentities($result->Email);?></td>
    <td><?php echo htmlentities($result->Odasayisi);?></td>
    <td><?php echo htmlentities($result->Kisisayisi);?></td>
    <td><?php echo htmlentities($result->Giristarihi);?></td>
    <td><?php echo htmlentities($result->Cikistarihi);?></td>

    <td><a href="guncelle.php?id=<?php echo htmlentities($result->id);?>"><button class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>

    <td><a href="rezervasyonkontrol.php?del=<?php echo htmlentities($result->id);?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Rezervasyon silinicek onaylıyor musun?');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
    </tr>


<?php
// for serial number increment
$cnt++;
}} ?>
</tbody>
</table>
</div>
</div>
</div>
<br>
     <div class="form-group text-center btn-lg">
         <a href="../uyeindex.php">   <input type="button" class="btn btn-success" value="Anasayfaya Dön"></a>
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
</main>
</body>
</html>

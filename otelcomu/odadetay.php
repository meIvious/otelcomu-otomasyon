<?php
include("fonksiyonlar/fonksiyon.php");
$odam=new oteliskelet;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="dosyalar/jquery.js"></script>
<link rel="stylesheet" href="dosyalar/bootstrap.css" >
<link rel="stylesheet" href="dosyalar/style.css" >

<title>Otel Rezervasyonu</title>

<body>
  <div class="container-fluid">
<?php
  echo $_GET["odaid"];  //odalar çekiliyor
?>

  </div>


</body>
</html>

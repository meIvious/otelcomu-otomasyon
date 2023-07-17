<?php
include("fonksiyonlar/fonksiyon.php");
	$oteliskelet=new oteliskelet;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="dosyalar/jquery.js"></script>
<link rel="stylesheet" href="dosyalar/bootstrap.css" >
<link rel="stylesheet" href="dosyalar/style.css" >
<title>Otel Rezervasyonu</title>
</head>
<style>
#oda a:link, #oda a:visited {
text-decoration: none;
}
#oda2{
	height: 180px;
	border-radius: 5px;
	font-size: 15px;
	font-family:Comic Sans MS;
	color:#DD2C00;

}
h6{
	color: 		#283593;
}
#oda3{
	height:60px;

}
#div1{
	background-color:#5e72e4;
	min-height:50px;
	color:#fff;
	font-size: 30px;
	font-family:Comic Sans MS;
}

</style>
<body>
	<div class="container-fluid ">

		<div class="row ">
			 <div class="col-md-12 border-dark mx-auto p-2 mb-4 text-center" id="div1" >Oda Seçimi</div>
		</div>
		<div class="form-group text-center btn-lg">
         <a href="http://localhost/otelcomu/uyeindex.php">   <input type="button" class="btn btn-warning" value="Anasayfaya Dön"></a>
       </div>
			  		<div class="row">
 						<?php
						$oteliskelet->odalaricek($db);
 					?>
					</div>
  </div>
</body>
</html>

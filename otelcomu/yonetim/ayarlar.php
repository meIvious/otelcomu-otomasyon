
<?php
	include("yonetimfonk.php");
	$yonetimclas=new yonetici;
	$yonetimclas->cookcon($vt,false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="../dosyalar/jquery.js"></script>
<link rel="stylesheet" href="../dosyalar/bootstrap.css" >
<link rel="stylesheet" href="../dosyalar/style.css" >
 <link href="../dosyalar/font-awesome/css/all.css" rel="stylesheet">
 <link href="../dosyalar/font-awesome/webfonts" rel="stylesheet">
<title>Otel Rezervasyonu</title>
</head>
<style>

	.container-fluid,
	.row-fluid{
		height: inherit;
	}
	a:link, a:visited, a:active {
	font-family:Comic Sans MS;
	font-size: 18px;
	color :#000000;
	text-decoration : none;
	}

#btnyonetim2:hover a{
	color:		#FF3D00;
}
#btnyonetim2:hover {
	background-color:#EEEEEE;
}
#div1{
		background-color:#fff;
		border:1px; solid #F1F1F1;
		border-radius: 15px;
			min-height: 100%;
}
#div3{
		height:80px;
		font-size:20px;
			border-radius:10px;
		font-family:Comic Sans MS;
		background-color: #fff;

}

#div4{
	background-color:#5e72e4;
	min-height:137px;
}

h4{
		color:#5e72e4;
}


</style>
<body>
	<div class="container-fluid ">
  <div class="row row-fluid">
  <div class="col-md-2  border-right">
		<div class="row" >
			<div class="col-md-12  p-4 mx-auto text-center weight-bold">
		  <h4>Otel Rezervasyonu</h4>
		</div>
	</div><br>
	<div class="row" >
	<div class="col-md-12 p-3 pl-3 border-top" id="btnyonetim2">
		 <a href="http://localhost/otelcomu/uyeindex.php"> <i class="fas fa-home" style="color:#black"></i>  Anasayfa</a>
		</div>
		 <div class="col-md-12 p-3 pl-3 border-top" id="btnyonetim2">
		 <a href="ayarlar.php?islem=odayonetimi"> <i class="fas fa-bed" style="color:#2E7D32"></i>  Oda Yönetimi</a>
		</div>
		<div class="col-md-12  p-3 pl-3 "id="btnyonetim2">
		<a href="ayarlar.php?islem=rezervasyonyonetimi" ><i class="fas fa-clipboard-list" style="color:#6A1B9A"></i> Rezervasyonlar</a>
		</div>
		<div class="col-md-12  p-3 pl-3 "id="btnyonetim2">
		<a href="ayarlar.php?islem=uyeyonetimi" ><i class="fas fa-users" style="color:#FF6F00"></i> Üyeler</a>
		</div>
		<div class="col-md-12  p-3 pl-3 " id="btnyonetim2">
		<a href="ayarlar.php?islem=rapor" ><i class="fas fa-book" style="color:#FFD600"></i> Rapor Yönetimi</a>
		</div>
		<div class="col-md-12  p-3 pl-3  "id="btnyonetim2">
		<a href="ayarlar.php?islem=sifredegistir" ><i class="fas fa-lock"style="color:#DD2C00"></i> Şifre Değişikliği</a>
		</div>
		<div class="col-md-12  p-3 pl-3  "id="btnyonetim2">
		<a href="ayarlar.php?islem=cikis" ><i class="fas fa-door-open"style="color:	#0D47A1"></i> Çıkış</a>
		</div>
</div>
		</div>

  <div class="col-md-10 ">
		<div class="row">
		<div class="col-md-12">
			<div class="row " id="div4">
					<div class="col-md-3 col-sm-6 mr-2  mx-auto mt-3 p-2 text-center text-dark " id="div3" >Rezervasyon Sayısı<br>
				 <i class="fas fa-calendar-check"  style="color:#C51162"></i>  	<?php $yonetimclas->toplamrezervasyon($vt); ?> </div>

					<div class="col-md-3 col-sm-6 mr-2  mx-auto mt-3 p-2 text-center text-dark" id="div3">Oda Sayısı<br>
			<i class="fas fa-bed " style="color:#2E7D32"></i> <?php $yonetimclas->toplamoda($vt); ?>   </div>

			<div class="col-md-3 col-sm-6 mr-2  mx-auto mt-3 p-2 text-center text-dark " id="div3" >Üye Sayısı<br>
				<i class="fas fa-user" style="color:	#FF6F00"></i> <?php $yonetimclas->toplamuye($vt); ?></div>
		</div>

	<div class="col-md-12" id="div1">

	<div class="col-md-12 mt-4" id="div1">

	  <?php
	  @$islem=$_GET["islem"];
	  switch ($islem) :
/////////////////////////////ODA YÖNETİMİ///////////////////////
	  case "odayonetimi":
		$yonetimclas->odayonetimi($vt);
		break;

      case "odasil":
		$yonetimclas->odasil($vt);
		break;

      case "odaguncelle":
		$yonetimclas->odaguncelle($vt);
		break;

	  case "odaekle":
		$yonetimclas->odaekle($vt);
		break;
////////////////////////////////////////////////////////////////

		case "rezervasyonyonetimi":
      $yonetimclas->rezervasyonyonetimi($vt);
        break;
				case "rezervasyonsil":
			$yonetimclas->rezervasyonsil($vt);
			break;
			////////////////////////////////////////////////////////////////

					case "uyeyonetimi":
			      $yonetimclas->uyeyonetimi($vt);
			        break;
							case "uyesil":
						$yonetimclas->uyesil($vt);
						break;


///////////////////////////////////////////////////////////////////
		case "rapor":
      $yonetimclas->rapor($vt);
        break;
///////////////////////////////////////////////////////////////////
			case "sifredegistir":
        $yonetimclas->sifredegistir($vt);
          break;
///////////////////////////////////////////////////////////////////
	  case "cikis":
	  $yonetimclas->cikis($yonetimclas->kulad($vt));
	  break;
	  endswitch;
	  ?>

	 		</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
</body>
</html>

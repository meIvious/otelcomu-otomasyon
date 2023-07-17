<?php
include("config.php");
include('class/uyesinif.php');
$uyesinif = new uyesinif();

$kayithatamesaji='';
$girishatamesaji='';
if (!empty($_POST['girisbtn']))
{
$kuladEmail=$_POST['kuladEmail'];
$sifre=$_POST['sifre'];
 if(strlen(trim($kuladEmail))>1 && strlen(trim($sifre))>1 )  //strlen karakter sayısı,trim string bası ve sonu siliyor
   {
    $id=$uyesinif->uyegiris($kuladEmail,$sifre);
    if($id)
    {
        $url=BASE_URL.'uyeindex.php';
        header("Location: $url");
    }
    else
    {
        $girishatamesaji="Lütfen bilgilerinizi kontrol edin";
    }
   }
}

if (!empty($_POST['kayitbtn']))
{

	$kulad=$_POST['kuladKayit'];
	$email=$_POST['emailKayit'];
	$sifre=$_POST['sifreKayit'];
  $adsoyad=$_POST['adsoyadKayit'];
	$kulad_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $kulad);
	$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);  //dogrulamak icin vs
	$sifre_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $sifre);

	if($kulad_check && $email_check && $sifre_check && strlen(trim($adsoyad))>0)
	{
    $id=$uyesinif->uyekayit($kulad,$sifre,$email,$adsoyad);
    if($id)
    {
    	$url=BASE_URL.'uyeindex.php';
    	header("Location: $url");
    }
    else
    {
      $kayithatamesaji="Kullanıcı Adı veya Email kullanılmakta ";
    }

	}


}

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="dosyalar/bootstrap.css">
<style>

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
	background: #f6f5f7;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}



h2 {
	text-align: center;
  font-weight: bold;
  margin: 0;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.buttons {
    margin: 10%;
    text-align: center;
}

.btn-hover {
    width: 200px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    margin: 20px;
    height: 45px;
    text-align:center;
    border: none;
    background-size: 300% 100%;

    border-radius: 50px;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.btn-hover:hover {
    background-position: 100% 0;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.btn-hover:focus {
    outline: none;
}
.btn-hover.color-9 {
    background-image: linear-gradient(to right, #25aae1, #4481eb, #04befe, #3f86ed);
    box-shadow: 0 4px 15px 0 rgba(65, 132, 234, 0.75);
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 10px 0;
	width: 100%;
  border-radius: 30px;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25),
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}

	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
	background: #FF416C;
	background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
	background: linear-gradient(to right, #FF4B2B, #FF416C);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay-right {
	transform: translateX(20%);
}
.errorMsg{color: #cc0000;margin-bottom: 10px}
</style>
<body>
  <div class="container" id="container">
  <div id="login" class="form-container sign-in-container">
<form method="post" action="" name="login">
  <h2>Giriş Yap</h2><br>
<input type="text" name="kuladEmail" autocomplete="off"  placeholder="Kullanıcı Adı veya Email"  />
<input type="password" name="sifre" autocomplete="off" placeholder="Sifre" />
<div class="errorMsg"><?php echo $girishatamesaji; ?></div>
<input type="submit" class="btn btn-warning  mt-2" name="girisbtn" value="Giriş">
</form>
</div>


<div id="signup" class="form-container sign-up-container">
		<form method="post" action="#" name="signup">
			<h2>Kayıt Ol</h2><br>
<input type="text" name="adsoyadKayit" autocomplete="off" placeholder="Ad Soyad" />
<input type="text" name="emailKayit" autocomplete="off" placeholder="Email" />
<input type="text" name="kuladKayit" autocomplete="off" placeholder="Kullanıcı Adı" />
<input type="password" name="sifreKayit" autocomplete="off" placeholder="Sifre" />
<div class="errorMsg"><?php echo $kayithatamesaji; ?></div>
<input  type="submit" class="btn btn-warning"  name="kayitbtn" value="Kayıt Ol">
</form>
</div>
<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h2>Hoşgeldin</h2>
				<p>Lütfen kişisel bilgilerinizle giriş yapın</p>
				<button class="btn-hover color-9" id="giris">Giriş Yap</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h2>Hoşgeldin</h2>
				<p>Kişisel bilgilerinizi girin ve bizimle tatil yolculuğuna başlayın</p>
				<button class="btn-hover color-9" id="kayit">Kayıt Ol</button>
			</div>
		</div>
	</div>
</div>
<script>

const signUpButton = document.getElementById('kayit');
const signInButton = document.getElementById('giris');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

</script>
</body>
</html>

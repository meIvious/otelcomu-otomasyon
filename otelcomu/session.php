 <?php
if(!empty($_SESSION['id']))
{
$session_id=$_SESSION['id'];
include('class/uyesinif.php');
$uyesinif = new uyesinif();
}

if(empty($session_id))
{
$url=BASE_URL.'uyelik.php';
header("Location: $url");
}
?>

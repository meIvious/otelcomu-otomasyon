
<?php
$db = new mysqli("localhost","root","","otelcomu")or die ("Bağlanamadı");
$db->set_charset("utf8");


class oteliskelet{

  private function sorgum($vt,$sorgu,$tercih) {
    $a=$sorgu;
    $b=$vt->prepare($a);//yazılmış olan sorguyu ön belleğe atar,güvenlik içinde kullanılır
    $b->execute();//sorguyu calıstır
    if($tercih==1): //eger tercih eşitse 1 bana getresultu ver
    return	$c=$b->get_result();//sonucu aktarma
    endif;
  }     //ilk sorgum


  function odalaricek($dv) {
  $odalar="select * from odalar";
  $sonuc=$this->sorgum($dv,$odalar,1);
  while($odasonuc=$sonuc->fetch_assoc())://odasonuc verisini aktar veri oldukça bu divden oluştur.
    echo'
    <div class="col-md-10 border border-muted bg-white mx-auto mb-4  text-dark" id="oda2" >
      <div class="row" >
      <div class="col-md-4 border-right border-muted"><img src="dosyalar/img/deneme.png" class="img-responsive" alt="Responsive image"></div>
  <div class="col-md-5 border-right border-muted" >
    <div class="row">
      <div class="col-md-12  mx-auto  text-center" id="oda3"><h6>Oda Bilgisi</h6> '.$odasonuc["ozellik"].'</div>
      <div class="col-md-12 border-top border-muted mx-auto  text-center "id="oda3"><center><h6>Konum</h6></center> '.$odasonuc["konum"].'</div>
      <div class="col-md-12 border-top border-muted mx-auto  text-center "id="oda3"><center><h6>Müşteri Puanlaması</h6></center> '.$odasonuc["degerlendirme"].'</div>
   </div>
 </div>
    <div class="col-md-3">
    <div class="row">
    <div class="col-md-12   mx-auto text-center p-3"id="oda3">'.$odasonuc["ad"].'</div>
    <div class="col-md-12 border-top border-muted mx-auto text-center p-3 "id="oda3">'.$odasonuc["fiyat"].' TL</div>
    <div class="col-md-12 border-top border-muted mx-auto text-center p-3 "id="oda3">	<a href="pdo/ekle.php" class="btn btn-success ">Rezervasyon Yap</a></div>
    </div>
    </div>
    </div>
    </div>';

  endwhile;

}
}
?>

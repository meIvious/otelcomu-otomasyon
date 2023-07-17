<?php
$vt=new mysqli("localhost","root","","otelcomu") or die ("Bağlanamadı");
$vt->set_charset("utf8");

class yonetici {

  private function sorgum3 ($dv,$sorgu){
		$sorgum=$dv->prepare($sorgu);
		$sorgum->execute();
		return $sorguson=$sorgum->get_result();
	}


  private function uyari($tip,$metin,$sayfa){
		echo '<div class="alert alert-'.$tip.'">'.$metin.'</div>';
		header('refresh:2,url='.$sayfa.'');
	}
  function toplamrezervasyon($vt){
     echo $this->sorgum3($vt,"select*from  rezervasyonbilgileri")->num_rows;
 }
 function toplamoda($vt) {

   echo $this->sorgum3($vt,"select*from odalar")->num_rows;
 }
 function toplamuye($vt) {

   echo $this->sorgum3($vt,"select*from uyeler")->num_rows;
 }



  //////////////////////// Oda yönetimi ve listeleme fonksiyonu///////////////////
    public function odayonetimi ($vt) {
        $so=$this->sorgum3($vt, "select * from odalar");

        echo '<table class="table text-center table-striped table-bordered mx-auto col-md-10 mt-4">
        <thead>
            <tr>
                <th scope="col">ODA Ekle<a href = "ayarlar.php?islem=odaekle" class="btn btn-success">+</a></th>
                <th scope="col">FİYAT</th>
                <th scope="col">ÖZELLİK</th>
                <th scope="col">KONUMU</th>
                <th scope="col">DEĞERLENDİRME</th>
                <th scope="col">GÜNCELLE</th>
                <th scope="col">SİL</th>
            </tr>
        </thead>
        <tbody>';

        while ($sonuc=$so->fetch_assoc()):
            echo    '<tr>
                        <td>'.$sonuc["ad"].'</td>
                        <td>'.$sonuc["fiyat"].' TL</td>
                        <td>'.$sonuc["ozellik"].'</td>
                        <td>'.$sonuc["konum"].'</td>
                        <td>'.$sonuc["degerlendirme"].'</td>
                        <td><a href = "ayarlar.php?islem=odaguncelle&odaid='.$sonuc["id"].'" class="btn btn-warning"</a>Güncelle</td>
                        <td><a href = "ayarlar.php?islem=odasil&odaid='.$sonuc["id"].'" class="btn btn-danger" data-confirm="Odayı silmek istediğinize emin misiniz?"</a>Sil</td>
                    </tr>';

        endwhile;

        echo '</tbody>
            </table>';

    }
    public function odasil ($vt) {
       $odaid = $_GET["odaid"];

       if ($odaid != "" && is_numeric($odaid)):
           $this->sorgum3($vt, "delete from odalar where id=$odaid");
           $this->uyari("success", "Oda Silindi", "ayarlar.php?islem=odayonetimi");
       else:
           $this->uyari("danger", "Hata Oluştu", "ayarlar.php?islem=odayonetimi");

       endif;
   }

/////////////////////// Yönetici Oda güncelle fonksiyonu/////////////////
   public function odaguncelle($vt) {

       @$buton = $_POST["buton"];

       echo '<div class="col-md-6 text-center mx-auto mt-5 table-bordered">';


       if ($buton) :
               // db işlemleri
               @$odaad= htmlspecialchars($_POST["odaad"]);
               @$fiyatad= htmlspecialchars($_POST["fiyatad"]);
               @$ozellikad= htmlspecialchars($_POST["ozellikad"]);
               @$konumad= htmlspecialchars($_POST["konumad"]);
               @$degerlendirmead= htmlspecialchars($_POST["degerlendirmead"]);
               @$odaid = htmlspecialchars($_POST["odaid"]);

               if ($odaad == "" || $fiyatad == "" || $ozellikad == "" || $konumad == "" || $degerlendirmead == "" || $odaid == "") :
                   $this->uyari("danger", "Bilgiler boş olamaz", "ayarlar.php?islem=odayonetimi");

               else:
                   $this->sorgum3($vt, "update odalar set ad = '$odaad' where id = $odaid");
                    $this->sorgum3($vt, "update odalar set fiyat = '$fiyatad' where id = $odaid");
                     $this->sorgum3($vt, "update odalar set ozellik = '$ozellikad' where id = $odaid");
                      $this->sorgum3($vt, "update odalar set konum = '$konumad' where id = $odaid");
                       $this->sorgum3($vt, "update odalar set degerlendirme = '$degerlendirmead' where id = $odaid");

                   $this->uyari("success", "Oda Güncellendi", "ayarlar.php?islem=odayonetimi");

               endif;
       else:
           $odaid = $_GET["odaid"];
           $aktar = $this->sorgum3($vt, "select * from odalar where id = $odaid")->fetch_assoc();

           echo '
                   <form action = "" method = "post">

                       <div class="col-md-12 table-light border-bottom"><h4>ODA GÜNCELLE</h4></div>
                       <div class="col-md-12 table-light"> Adı<input type = "text" name = "odaad" class = "form-control mt-3" value = "'.$aktar["ad"].'"/></div><br>
                       <div class="col-md-12 table-light">Fiyatı<input type = "text" name = "fiyatad" class = "form-control mt-3" value = "'.$aktar["fiyat"].'"/></div><br>
                       <div class="col-md-12 table-light"> Özellik<input type = "text" name = "ozellikad" class = "form-control mt-3" value = "'.$aktar["ozellik"].'"/></div><br>
                       <div class="col-md-12 table-light"> Konumu<input type = "text" name = "konumad" class = "form-control mt-3" value = "'.$aktar["konum"].'"/></div><br>
                       <div class="col-md-12 table-light"> Degerlendirme (5 Üzerinden)<select name = "degerlendirmead" class = "form-control mt-3" value = "'.$aktar["degerlendirme"].'"/>  <option selected></option>
                         <option>1</option>
                         <option>2</option>
                         <option>3</option>
                         <option>4</option>
                         <option>5</option>
                         </select></div>
                       <div class="col-md-12 table-light"> <input name = "buton" value = "Güncelle" type = "submit" class = "btn btn-success mt-3 mb-3"/></div>

                       <input type = "hidden" name = "odaid" value = "'.$aktar["id"].'"/>
                   </form>
               ';

       endif;

       echo '</div>';

   }

////////////////////////////// Yönetici Oda ekle fonksiyonu//////////////////////////////
   public function odaekle ($vt) {

       @$buton = $_POST["buton"];

       if ($buton) :
               // db işlemleri
               @$odaad = htmlspecialchars($_POST["odaad"]);
               @$fiyatad= htmlspecialchars($_POST["fiyatad"]);
               @$ozellikad= htmlspecialchars($_POST["ozellikad"]);
               @$konumad= htmlspecialchars($_POST["konumad"]);
               @$degerlendirmead= htmlspecialchars($_POST["degerlendirmead"]);

               if ($odaad == "" || $fiyatad == "" || $ozellikad == "" || $konumad == "" || $degerlendirmead == "") :
                   $this->uyari("danger", " boş olamaz", "ayarlar.php?islem=odayonetimi");

               else:
                   $this->sorgum3($vt, "insert into odalar (ad,fiyat,ozellik,konum,degerlendirme) values ('$odaad',$fiyatad,'$ozellikad','$konumad',$degerlendirmead)");


                   $this->uyari("success", "Oda Eklendi", "ayarlar.php?islem=odayonetimi");

               endif;

       else:

           echo '<div class="col-md-3 text-center mx-auto mt-5 table-bordered">
                   <form action = "" method = "post">

                       <div class="col-md-12 table-light border-bottom"><h4>Oda EKLE</h4></div>
                       <div class="col-md-12 table-light">Adı<input type = "text" name = "odaad" class = "form-control mt-3" require /></div>
                       <div class="col-md-12 table-light">Fiyatı<input type = "text" name = "fiyatad" class = "form-control mt-3" /></div><br>
                       <div class="col-md-12 table-light"> Özellik<input type = "text" name = "ozellikad" class = "form-control mt-3" /></div><br>
                       <div class="col-md-12 table-light"> Konumu<input type = "text" name = "konumad" class = "form-control mt-3" /></div><br>
                       <div class="col-md-12 table-light"> Degerlendirme (5 Üzerinden)<select name = "degerlendirmead" class = "form-control mt-3"/>  <option selected></option>
                         <option>1</option>
                         <option>2</option>
                         <option>3</option>
                         <option>4</option>
                         <option>5</option>
                         </select></div>
                       <div class="col-md-12 table-light"><input name = "buton" value = "Ekle" type = "submit" class = "btn btn-success mt-3 mb-3"/></div>

                   </form>
               </div>';

       endif;
   }

   public function rezervasyonyonetimi ($vt) {
       $so=$this->sorgum3($vt, "select * from  rezervasyonbilgileri");

       echo '<table class="table text-center table-striped table-bordered mx-auto col-md-12 mt-4">
       <thead>
           <tr>

               <th scope="col">Adı</th>
               <th scope="col">Soyadı</th>
               <th scope="col">Telefon</th>
               <th scope="col">Email</th>
               <th scope="col">Oda Sayısı</th>
               <th scope="col">Kişi Sayısı</th>
               <th scope="col">Giriş Tarihi</th>
               <th scope="col">Çıkış Tarihi</th>
               <th scope="col">SİL</th>
           </tr>
       </thead>
       <tbody>';

       while ($sonuc=$so->fetch_assoc()):
           echo    '<tr>
                       <td>'.$sonuc["Ad"].'</td>
                       <td>'.$sonuc["Soyad"].' </td>
                       <td>'.$sonuc["Telno"].'</td>
                       <td>'.$sonuc["Email"].'</td>
                       <td>'.$sonuc["Odasayisi"].'</td>
                       <td>'.$sonuc["Kisisayisi"].'</td>
                       <td>'.$sonuc["Giristarihi"].'</td>
                       <td>'.$sonuc["Cikistarihi"].'</td>
                       <td><a href = "ayarlar.php?islem=rezervasyonsil&rezerveid='.$sonuc["id"].'" class="btn btn-danger text-white" </a>Sil</td>
                   </tr>';

       endwhile;

       echo '</tbody>
           </table>';

   }

   public function rezervasyonsil ($vt) {
      $rezerveid = $_GET["rezerveid"];

      if ($rezerveid != "" && is_numeric($rezerveid)):
          $this->sorgum3($vt, "delete from rezervasyonbilgileri where id=$rezerveid");
          $this->uyari("success", "Oda Silindi", "ayarlar.php?islem=rezervasyonyonetimi");
      else:
          $this->uyari("danger", "Hata Oluştu", "ayarlar.php?islem=rezervasyonyonetimi");

      endif;
  }


  public function uyeyonetimi ($vt) {
      $so=$this->sorgum3($vt, "select * from  uyeler");

      echo '<table class="table text-center table-striped table-bordered mx-auto col-md-12 mt-4">
      <thead>
          <tr>
              <th scope="col">Ad Soyad Bilgisi</th>
              <th scope="col">Email</th>
              <th scope="col">Kullanıcı Adı</th>
              <th scope="col">Üyelik Tarihi</th>
              <th scope="col">SİL</th>
          </tr>
      </thead>
      <tbody>';

      while ($sonuc=$so->fetch_assoc()):
          echo    '<tr>
                      <td>'.$sonuc["adsoyad"].'</td>
                      <td>'.$sonuc["email"].' </td>
                      <td>'.$sonuc["kulad"].'</td>
                      <td>'.$sonuc["uyeliktarihi"].'</td>
                      <td><a href = "ayarlar.php?islem=uyesil&uyeid='.$sonuc["id"].'" class="btn btn-danger text-white"</a>Sil</td>
                  </tr>';

      endwhile;

      echo '</tbody>
          </table>';

  }

  public function uyesil ($vt) {
     $uyeid= $_GET["uyeid"];

     if ($uyeid != "" && is_numeric($uyeid)):
         $this->sorgum3($vt, "delete from uyeler where id=$uyeid");
         $this->uyari("success", "Oda Silindi", "ayarlar.php?islem=uyeyonetimi");
     else:
         $this->uyari("danger", "Hata Oluştu", "ayarlar.php?islem=uyeyonetimi");

     endif;
 }



  function kulad($db){
    $sorgu="select * from yonetici";
    $gelensonuc=$this->sorgum3($db,$sorgu);
    $b=$gelensonuc->fetch_assoc();
    return $b["kulad"];
  }

  function cikis ($deger) {
    $deger=md5(sha1(md5($deger)));
    setcookie("kul",$deger, time() - 10);
    $this->uyari("success","Çıkış yapılıyor","index.php");
  }


  public   function giriskontrolu($r,$k,$s){
      $sonhal=md5(sha1(md5($s)));
      $sorgu="select * from yonetici where kulad='$k' and sifre='$sonhal'";
      $sor=$r->prepare($sorgu);
      $sor->execute();
      $sonbilgi=$sor->get_result();

      if($sonbilgi->num_rows==0):

        $this->uyari("danger","Bilgiler Hatalı","index.php");
        else:
        $this->uyari("success","Giriş Yapılıyor","ayarlar.php");

      $kulson=md5(sha1(md5($k)));
      setcookie("kul",$kulson, time() + 60*60*24);

      endif;
    }

    public  function cookcon($d,$durum=false) {
  		if(isset($_COOKIE["kul"])) :

  		 $deger=$_COOKIE["kul"];

       $sorgu="select * from yonetici";
  		 $sor=$d->prepare($sorgu);
  		 $sor->execute();
  		 $sonbilgi=$sor->get_result();
       $veri=$sonbilgi->fetch_assoc();
       $sonhal=md5(sha1(md5($veri["kulad"])));
  		 if ($sonhal!=$_COOKIE["kul"]):
  		setcookie("kul",$deger, time() - 10);
  		  header("Location:index.php");
      else:
       if ($durum==true) : header("Location:ayarlar.php"); endif;
     endif;

   else:
   if($durum==false) : header("Location:index.php");
  	endif;
  	endif;
  }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function rapor($vt) {
@$tarih = $_GET["tar"];
            switch ($tarih):
			
				 case "ay":
                    $this->sorgum3($vt, "Truncate gecicirapor");
                    $veri = $this->sorgum3($vt, "select * from rapor where tarih >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)");
                    
                break;

                case "tarih":
                    $this->sorgum3($vt, "Truncate gecicirapor");
                    $tarih1 = $_POST["tarih1"];
                    $tarih2 = $_POST["tarih2"];
                    echo '<div class = "alert alert-info text-center mx-auto mt-4">

                       Tarih Seçimi: '.$tarih1.' - '.$tarih2.'

                    </div>';
                    $veri = $this->sorgum3($vt, "select * from rapor where DATE(tarih) BETWEEN '$tarih1' AND '$tarih2'");
                   
                break;

                default;
					$this->sorgum3($vt,"Truncate gecicirapor");
                    $veri = $this->sorgum3($vt, "select * from rapor");

                break;
			

            endswitch;
			
			
			
		

            echo '<table class = "table text-center table-light table-bordered mx-auto mt-4 table-striped col-md-12">

                    <thead>
                        <tr>
                            <th colspan="8">';
							
							if(@$tarih1!="" || @$tarih2!=""):

                                endif;


                            echo '<thead class="table-dark">
                            <tr>
                                <th><a href="ayarlar.php?islem=rapor&tar=ay" class="text-white">Bu Ay</a></th>
                                <form action="ayarlar.php?islem=rapor&tar=tarih" method="post">
                                <th><input type="date" name = "tarih1" class="form-control col-md-10"></th>
                                <th><input type="date" name = "tarih2" class="form-control col-md-10"></th>

                            <th><input name="buton" type="submit" class="btn btn-danger" value="RAPOR"></form></th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
             
                    <tbody>
                    <tr>
                        <th colspan = "8">
                            <table class="table text-center table-bordered col-md-12">
                                <thead>
                                    <tr>
                                        <th colspan="6" class="table-dark">Rapor</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr class="bg-warning">
										<th colspan="1">İsim</th>
                                        <th colspan="1">Soyisim</th>
										<th colspan="1">Telefon</th>
										<th colspan="1">Giriş Tarihi</th>
										<th colspan="1">Çıkış Tarihi</th>
										<th colspan="1">Rezervasyon Tarihi</th>
										
                                    </tr>
                                </thead><tbody>';

                                $kilit = $this->sorgum3($vt, "select * from gecicirapor");
                                if($kilit->num_rows==0) :
								
                                    while ($gel = $veri->fetch_assoc()):
                                        $rezerveid = $gel["rezerveid"];
								        $tarih = $gel["tarih"];
                                        $rezervebilgi = $this->sorgum3($vt, "select * from rezervasyonbilgileri where id=$rezerveid")->fetch_assoc();
                                        $musteriad = $rezervebilgi["Ad"];
										$musterisoyad = $rezervebilgi["Soyad"];
										$telefon = $rezervebilgi["Telno"];
										$giris = $rezervebilgi["Giristarihi"];
										$cikis = $rezervebilgi["Cikistarihi"];
										
										$this->sorgum3($vt, "insert into gecicirapor (ad, soyad, telefon, giris, cikis, tarih) values ('$musteriad', '$musterisoyad', $telefon, '$giris', '$cikis', '$tarih')");
                                    endwhile;
									
									
									
								

                                endif;
						
								

                                $son = $this->sorgum3($vt, "select * from gecicirapor");


                                while ($listele = $son->fetch_assoc()):
                                    echo '<tr>
											<td colspan="1">'.$listele["ad"].'</td>
                                            <td colspan="1">'.$listele["soyad"].'</td>
											<td colspan="1">'.$listele["telefon"].'</td>
											<td colspan="1">'.$listele["giris"].'</td>
											<td colspan="1">'.$listele["cikis"].'</td>
											<td colspan="1">'.$listele["tarih"].'</td>
                                        </tr>';
                                endwhile;

                        echo'
                                </tbody>
                                    </table>
                                        </th>

                            </tr>
                                </tbody>
								
                                    </table>';
									
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function sifredegistir ($vt) {

            @$buton = $_POST["buton"];

            if ($buton) :
                    // db işlemleri
                    @$eskisifre = htmlspecialchars($_POST["eskisifre"]);
                    @$yeni1 = htmlspecialchars($_POST["yeni1"]);
                    @$yeni2 = htmlspecialchars($_POST["yeni2"]);

                    if ($eskisifre == "" || $yeni1 == "" || $yeni2 == "") :
                        $this->uyari("danger", "Bilgiler boş olamaz", "ayarlar.php?islem=sifredegistir");

                    else:
                        $eskisifreson=md5(sha1(md5($eskisifre)));

                        if($this->sorgum3($vt, "select * from yonetici where sifre = '$eskisifreson' ")->num_rows == 0) :
                            //Kayıt yoksa eski şifre hatalı
                            $this->uyari("danger", "Eski şifre hatalı", "ayarlar.php?islem=sifredegistir");

                        elseif($yeni1 != $yeni2):
                            $this->uyari("danger", "Yeni şifreler aynı değil", "ayarlar.php?islem=sifredegistir");

                        else:
                            $yenisifre=md5(sha1(md5($yeni1)));

                            $this->sorgum3($vt, "update yonetici set sifre = '$yenisifre'");
                            $this->uyari("success", "Şifre Değiştirildi", "ayarlar.php");

                        endif;

                    endif;

            else:
                ?>

                <div class="col-md-3 text-center mx-auto mt-5 table-bordered">
                        <form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "post">
                <?php
                        echo '<div class="col-md-12 table-light border-bottom"><h4>ŞİFRE DEĞİŞTİR</h4></div>
                            <div class="col-md-12 table-light"><input type = "text" name = "eskisifre" class = "form-control mt-3" require placeholder="Eski Şifreniz"/></div>
                            <div class="col-md-12 table-light"><input type = "text" name = "yeni1" class = "form-control mt-3" require placeholder="Yeni Şifreniz"/></div>
                            <div class="col-md-12 table-light"><input type = "text" name = "yeni2" class = "form-control mt-3" require placeholder="Yeni Şifreniz Tekrar"/></div>
                            <div class="col-md-12 table-light"><input name = "buton" value = "Değiştir" type = "submit" class = "btn btn-success mt-3 mb-3"/></div>

                        </form>
                    </div>';

            endif;
        }
}


?>

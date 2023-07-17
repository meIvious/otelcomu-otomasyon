<?php
class uyesinif
{
     public function uyegiris($kuladEmail,$sifre)
     {

          $db = getDB();
          $hash_password= hash('sha256', $sifre);
          $stmt = $db->prepare("SELECT id FROM uyeler WHERE  (kulad=:kuladEmail or email=:kuladEmail) AND  sifre=:hash_password");
          $stmt->bindParam("kuladEmail", $kuladEmail,PDO::PARAM_STR) ;
          $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
          $stmt->execute();
          $count=$stmt->rowCount();
          $data=$stmt->fetch(PDO::FETCH_OBJ);
          $db = null;
          if($count)
          {
				session_start();
                $_SESSION['id']=$data->id;
                return true;
          }
          else
          {
               return false;
          }
     }


     public function uyekayit($kulad,$sifre,$email,$adsoyad)
     {
          try{
          $db = getDB();
          $st = $db->prepare("SELECT id FROM uyeler WHERE kulad=:kulad OR email=:email");
          $st->bindParam("kulad", $kulad,PDO::PARAM_STR);
          $st->bindParam("email", $email,PDO::PARAM_STR);
          $st->execute();
          $count=$st->rowCount();
          if($count<1)
          {
          $stmt = $db->prepare("INSERT INTO uyeler(kulad,sifre,email,adsoyad) VALUES (:kulad,:hash_password,:email,:adsoyad)");
          $stmt->bindParam("kulad", $kulad,PDO::PARAM_STR) ;
          $hash_password= hash('sha256', $sifre);
          $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
          $stmt->bindParam("email", $email,PDO::PARAM_STR) ;
          $stmt->bindParam("adsoyad", $adsoyad,PDO::PARAM_STR) ;
          $stmt->execute();
          $id=$db->lastInsertId();
          $db = null;
          $_SESSION['id']=$id;
          return true;

          }
          else
          {
          $db = null;
          return false;
          }


          }
          catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}';
          }
     }


     public function uyedetay($id)
     {
        try{
          $db = getDB();
          $stmt = $db->prepare("SELECT email,kulad,adsoyad FROM uyeler WHERE id=:id");
          $stmt->bindParam("id", $id,PDO::PARAM_INT);
          $stmt->execute();
          $data = $stmt->fetch(PDO::FETCH_OBJ);
          return $data;
         }
         catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}';
          }

     }


}
?>

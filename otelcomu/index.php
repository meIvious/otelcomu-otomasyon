<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
   <link rel="stylesheet" href="tema/font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
   <link rel="stylesheet" href="tema/css/bootstrap.min.css">                                      <!-- Bootstrap style -->
   <link rel="stylesheet" type="tema/text/css" href="slick/slick.css"/>
   <link rel="stylesheet" type="tema/text/css" href="slick/slick-theme.css"/>
   <link rel="stylesheet" type="tema/text/css" href="css/datepicker.css"/>
   <link rel="stylesheet" href="tema/css/tooplate-style.css">
   <link rel="stylesheet" href="dosyalar/style.css">
 <title>Otel Rezervasyonu</title>
</head>
<body>
 <div class="tm-main-content" id="top">

           <nav class="navbar navbar-dark bg-dark navbar-expand-lg text-white ">
           <div class="container py-2">
             <a href="index.php"  class="navbar-brand">Otel Rezervasyonu</a>
             <button type="button" class="navbar-toggler" data-toggle="collapse" date-target="#navbar-comu" aria-controls="navbar-comu">
               <span class="navbar-toggler-icon"></span>
             </button>

             <div class="collapse navbar-collapse" id="navbar-comu">

               <ul class="navbar-nav ml-auto">
                 <li class="nav-item px-3">
                   <a href="uyelik.php" class="nav-link text-white">Giriş Yap</a>
           </li>


                 <li class="nav-item px-3 text-white ">
                   <a href="uyelik.php"  class="nav-link text-white">Kayıt Ol</a>
           </li>
               </ul>
             </div>
           </nav>
           <div class="tm-section tm-bg-img" id="tm-section-1">
               <div class="tm-bg-white ie-container-width-fix-2">
                   <div class="container ie-h-align-center-fix">
                       <div class="row">
                           <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix">
                               <form action="index.php" method="get" class="tm-search-form tm-section-pad-2">
                                   <div class="form-row tm-search-form-row">

                                       <div class="form-group tm-form-element tm-form-element-50">
                                           <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                                           <input name="check-in" type="date" class="form-control" id="giristarihi" placeholder="Giriş Tarihi">
                                         </div>
                                         <div class="form-group tm-form-element tm-form-element-50">
                                           <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                                           <input name="check-out" type="date" class="form-control" id="cikistarihi" placeholder="Çıkış Tarihi">
                                        </div>
                                        <div class="form-group tm-form-element tm-form-element-50">
                                            <select name="room" class="form-control tm-select" id="room">
                                                <option value="">Oda Tipi</option>
                                                <option value="1">Tek kişilik</option>
                                                <option value="2">iki Kişilik</option>
                                                <option value="3">Üç kişilik</option>
                                                <option value="4">Dört kişilik</option>
                                            </select>
                                            <i class="fa fa-2x fa-bed tm-form-element-icon"></i>
                                        </div>

                                        <div class="col-md-12 text-center text-white">
                                       <a href="uyelik.php" class="btn btn-primary ">Rezervasyon Ara</a>
                                       </div>
                                  </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <div class="tm-section-2">
               <div class="container">
                   <div class="row">
                       <div class="col text-center">
                           <h2 class="tm-section-title">Tatil İçin Doğru Yerdesin</h2><br>
                             <a href="uyelik.php" class="tm-color-white tm-btn-white-bordered">Hemen Rezervasyon Yapın</a>
                       </div>
                   </div>
               </div>
           </div>

           <div class="tm-section tm-position-relative">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" class="tm-section-down-arrow">
                   <polygon fill="#ee5057" points="0,0  100,0  50,60"></polygon>
               </svg>
               <div class="container tm-pt-5 tm-pb-4">
                   <div class="row text-center">
                       <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">
                           <i class="fa tm-fa-6x fa-car tm-color-primary tm-margin-b-20"></i>
                           <h3 class="tm-color-primary tm-article-title-1">Ulaşım Kolaylığı</h3>
                           <p>Ulaşım sistemlerinin oldukça gelişmiş olduğu kentte, gideceğiniz yere alternatifli olarak dilediğiniz araçla ulaşım sağlayabilirsiniz</p>
                       </article>
                       <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">
                           <i class="fa tm-fa-6x fa-credit-card tm-color-primary tm-margin-b-20"></i>
                           <h3 class="tm-color-primary tm-article-title-1">Güvenli Ödeme</h3>
                           <p>Ödeme sırasında kredi kartı ile ilgili bilgiler sitemizden bağımsız olarak 128 bit SSL protokolü ile şifrelenir</p>
                       </article>
                       <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">
                           <i class="fa tm-fa-6x fa-cutlery tm-color-primary tm-margin-b-20"></i>
                           <h3 class="tm-color-primary tm-article-title-1">Dünya Lezzetleri</h3>
                           <p>Dünyanın dört bir yanından en lezzetli, en özgün ve en tipik yemekleri sizin için bir araya getirdik.</p>
                       </article>
                   </div>
               </div>
           </div>
           <footer class="tm-bg-dark-blue">
               <div class="container">
                   <div class="row">
                       <p class="col-sm-12 text-center tm-font-light tm-color-white p-4 tm-margin-b-0">
                     &copy; <span class="tm-current-year">2020</span> Otel Rezervasyon-Çomü</p>
                   </div>
               </div>
           </footer>
       </div>

       <!-- load JS files -->

   <script src="dosyalar/jquery.js"></script>
       <script src="tema/js/jquery-1.11.3.min.js"></script>
       <script src="tema/js/popper.min.js"></script>
       <script src="tema/js/bootstrap.min.js"></script>
       <script src="tema/js/datepicker.min.js"></script>
       <script src="tema/slick/slick.min.js"></script>
       <script>

           $(document).ready(function(){
             const pickerCheckIn = datepicker('#giristarihi');
             const pickerCheckOut = datepicker('#cikistarihi');

           });
     $('.datepicker').datepicker({
             format: 'dd/mm/yyyy',
              language: 'tr'
});

       </script>
</body>
</html>

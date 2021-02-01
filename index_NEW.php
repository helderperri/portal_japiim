<?php
require_once ("config.php");
$username = "";
$user_picture = "";
if(isset($_SESSION["accessToken"])){
    $username = $_SESSION['name'];
    $user_picture = $_SESSION['picture'];
 //header("Location:secure.php"); 
}else{
    
$loginURL = $googleClient->createAuthUrl();

}



?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale= 1'>

        <title>Portal Japiim</title>

      <!-- Latest compiled and minified CSS -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <link href='css/styles.css' rel='stylesheet'>
      <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!--
      <link rel="manifest" href="/site.webmanifest">
-->
  <!-- Favicon-->
      
      <link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
      <link rel="mask-icon" href="icons/safari-pinned-tab.svg" color="#da532c">
      <meta name="msapplication-TileColor" content="#d82b5f">
      <meta name="theme-color" content="#ffffff">


      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>



        <!-- OLD Below check later-->
      
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Portal Japiim - Prodoclin</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item dropdown order-2 order-lg-1">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dicionários
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: transparent;">
                                    
                                <li class="nav-item dropdown-item disabled"><a class="nav-link dic" ref="arutani/index.php" href="javascript:void(0)">Arutani</a></li>
                                <li class="nav-item dropdown-item disabled"><a class="nav-link dic" ref="baniwa/index.php" href="javascript:void(0)">Baniwa-Kuripako</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="guato/index.php">Guato</a></li>
                                <li class="nav-item dropdown-item disabled"><a class="nav-link dic" ref="kawahiva/index.php" href="javascript:void(0)">Kawahiva</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" ref="kheuol/index.php" href="javascript:void(0)">Kheuól</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" ref="korubo/index.php" href="javascript:void(0)">Korubo</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="more/index.php">Moré-Kuyubim</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" ref="sanoma/index.php" href="javascript:void(0)">Sanöma</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="taurepang/index.php">Taurepang</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" ref="werekena/index.php" href="javascript:void(0)">Werekena</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" ref="xinane/index.php" href="javascript:void(0)">Xinane Yura</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" ref="yekwana/index.php" href="javascript:void(0)">Ye'kwana</a></li>



                            </ul>
                        </li>

                        <li class="nav-item dropdown order-3 order-lg-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ferramentas 
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2" style="background-color: transparent;">
                                    
                                <li class="nav-item dropdown-item"><a class="nav-link " href="#tecladospc">Teclados para PC</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link " href="#tecladosandroid">Teclados para Android</a></li>



                            </ul>
                        </li>
                        <li class="nav-item order-4 order-lg-3"><a class="nav-link" rel="noopener noreferrer" target="_blank" href="http://prodoclin.museudoindio.gov.br/index.php/projetos">Prodoclin</a></li>


                        <?php
                    if(isset($_SESSION["accessToken"])){
                        ?>
                        <li class="nav-item dropdown order-1 order-lg-4">
                                <a class="nav-link dropdown-toggle" href="#" id="user_nav" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <img src="<?php echo $user_picture;?>" width="25" height="25" class="rounded-circle">
                                  <?php echo $username;?></a>

                        <ul class="dropdown-menu" aria-labelledby="user_nav" style="background-color: transparent;">                           

                                    <li class="nav-item dropdown-item"><a class="nav-link " href='secure.php' >Conta</a></li>
                                    <li class="nav-item dropdown-item"><a class="nav-link " href='secure.php' >Notificações</a></li>
                                    <li class="nav-item dropdown-item"><a class="nav-link " href='secure.php' >Palavras</a></li>
                                    
                                    <div class="dropdown-divider"></div>
                                    
                                    <li class="nav-item dropdown-item"><a class="nav-link " href='logout.php' >Sair</a></li>
    
    
    
                                </ul>
                        </li>

                        <?php


                    }else{
 
}
?>     
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="col-12 masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h3 class="text-white-75 font-weight-light mb-5">Conheça as Línguas Indígenas do Brasil</h3>
                                
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                    <a class="btn btn-primary btn-sm" href="#about">Comece a navegar</a>
                                
                    </div>
<?php
                    if(isset($_SESSION["accessToken"])){

   
}else{

    ?>
                <div class="col-lg-8 align-self-baseline">
                
                <a class="btn btn-primary btn-sm" href="#about">Entre na su conta</a>
                <a class="btn btn-primary btn-sm" href="#about">Cadastre-se</a>
                  <div>

                  <p class="text-white-75 font-weight-light mb-5 p-4">
    <strong style="display: inline-block; vertical-align: center;">Fazer login com:</strong>
    <img src="icons/btn_google_signin_light_normal_web_short.png" style="height: 40px;" onclick="window.location.href = '<?php echo $loginURL; ?>'">
 </p>
                  </div>

                </div>
                <?php


}
?>            

                </div>
            </div>

        </header>
            <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Portal Japiim - Prodoclin</div></div>
        </footer>

    </body>
</html>

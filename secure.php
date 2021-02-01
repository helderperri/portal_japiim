<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}else{
}
if(!isset($_SESSION['accessToken'])){
    header("Location: index.php");
    die();
//    echo $_SESSION['email']; 
//    echo  $_SESSION['name'];
  //  echo  $_SESSION['given_name'];
  //  echo  $_SESSION['family_name'];
   // echo  $_SESSION['picture'];

}



?>
        <li class="nav-item dropdown">


        <!DOCTYPE html>
<html lang="pt">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
      <meta http-equiv='X-UA-Compatible' content='IE=edge'>
      <meta name='viewport' content='width=device-width, initial-scale= 1'>
   <title>Portal Japiim</title>

      <!-- Latest compiled and minified CSS -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <link href='css/styling.css' rel='stylesheet'>
      <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!--
      <link rel="manifest" href="/site.webmanifest">
-->
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

</head>

<body>


        <nav role='navigation' class='navbar navbar-expand-md navbar-toggleable-sm navbar-dark navbar-custom fixed-top'>

                  
          <a class='navbar-brand' style="font-size:0.9em;" href="#">Portal Japiim</a>

          <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          
              <span class="navbar-toggler-icon"></span>
          
            </button>
          
          
          
            <div class="collapse navbar-collapse" id="navbarCollapse">
          
            
                         <ul class='navbar-nav mr-auto mt-0 mt-lg-0'>
                          <li class="nav-item">
                            <a class="nav-link" href='index.php'>Portal Japiim</a>
                          </li>
          
                          <li class="nav-item">
                            <a class="nav-link" href='index.php'>Início</a>
                          </li>
                          <li class="nav-item">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <img src="<?php echo $_SESSION['picture'];?>" width="30" height="30" class="rounded-circle">
                                </a>
                            </li>

                         </ul>

            </div>
          
        </nav>

        <div class="d-flex flex-wrap align-items-start align-items-sm-baseline flex-lg-row flex-sm-column col-sm-12 col-xl-6 bd-highlight mb-3"  style="width: auto; padding:0em; margin:auto; margin-top: 4em; max-width: 600px;">


            <div class="d-flex p-0 flex-column col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">

<div class="container">
            <p>email: <?php     echo $_SESSION['email'];?></p>
            <p>nome: <?php     echo $_SESSION['name'];?></p>
            <p>primeiro nome:<?php     echo $_SESSION['given_name'];?></p>
            <p>sobrenome: <?php     echo $_SESSION['family_name'];?></p>
            <p>foto: <?php     echo $_SESSION['picture'];?></p>
            <p>língua de preferência: <?php     echo $_SESSION['locale'];?></p>
            <p>id do usuário: <?php     echo $_SESSION['user_id'];?></p>
            <p>emissor: <?php     echo $_SESSION['issuer'];?></p>
            <p>emitido em: <?php     echo $_SESSION['issued_at'];?></p>
            <p>expira em: <?php     echo $_SESSION['expires_at'];?></p>
            <p>email verificado: <?php     echo $_SESSION['email_verified'];?></p>
            <p>profile: <?php     echo $_SESSION['profile'];?></p>
    <!--            <p>user data: <?php     echo implode(" ", $_SESSION['user_data']);?></p>
    -->    


</div>
<a class="btn btn-primary btn-sm" href="logout.php" role="button">Sair da Conta</a>



        
        </div>
            
          
          


    
</body>
</html>
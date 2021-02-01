<?php

include("connection.php");


$native_name_sl1 = "";
$language_id_sl1 = "";
$language_code_sl1 = "";
$native_name_sl2 = "";
$language_id_sl2 = "";
$language_code_sl2 = "";


$native_name_tl1 = "";
$language_id_tl1 = "";
$language_code_tl1 = "";
$native_name_tl2 = "";
$language_id_tl2 = "";
$language_code_tl2 = "";






$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['loginTime'] = date("Y-m-d h:i:s");
$ip = $_SESSION['ip'];
$loginTime = $_SESSION['loginTime'];


//$username =$_SESSION['username'];

if(!empty($_POST['langtype'])){

  $langtype = $_POST['langtype'];


}else{
  $langtype=1;
}
if(!empty($_POST['langtype'])){

  $langtype = $_POST['langtype'];


}else{
  $langtype=1;
}


if(!empty($_POST['searchtype'])){

  $searchtype = $_POST['searchtype'];


}else{
  $searchtype=1;
}


if(!empty($_POST['entry_id'])){

  $entry_id = $_POST['entry_id'];


}else{
  $entry_id=1;
}

if(!empty($_POST['first_letter'])){

  $first_letter = $_POST['first_letter'];


}else{
  $first_letter= "A";
}


if(!empty($_POST['sd_id'])){

  $sd_id = $_POST['sd_id'];


}else{
  $sd_id=2;
}



if(!empty($_POST['class_id'])){

  $class_id = $_POST['class_id'];


}else{
  $class_id=2;
}


?>

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
                            <a class="nav-link" href='http://www.linguasyanomami.com/portaljapiim/index.html'>Portal Japiim</a>
                          </li>
          
                          <li class="nav-item">
                            <a class="nav-link" href='index.php'>Início</a>
                          </li>
                         </ul>

            </div>
          
        </nav>

        <div class="d-flex flex-wrap align-items-start align-items-sm-baseline flex-lg-row flex-sm-column col-sm-12 col-xl-6 bd-highlight mb-3"  style="width: auto; padding:0em; margin:auto; margin-top: 4em; max-width: 600px;">


            <div class="d-flex p-0 flex-column col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">








            </div>



        
        </div>
            
          
          


    
</body>
</html>
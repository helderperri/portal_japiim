<?php
require_once ("config.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



$username = "";
$user_picture = "";
if(isset($_SESSION["accessToken"])){
    $username = $_SESSION['name'];
    $user_picture = $_SESSION['picture'];
 
}else{

    if(isset($_SESSION["user_sub"])){

        $user_sub = $_SESSION["user_sub"];
        $username = $_SESSION['name'];
        $user_picture = $_SESSION['picture'];
    
    
        }else{

            if(isset($_COOKIE["user_sub"])){

            $user_sub = $_COOKIE["user_sub"];
            $username = $_COOKIE['name'];
            $user_picture = $_COOKIE['picture'];
            $_SESSION['user_sub'] = $user_sub;
            $_SESSION['name'] = $username;
            $_SESSION['picture'] = $user_picture;


            }else{
                
                $loginURL = $googleClient->createAuthUrl();
            }
        }

}



if(isset($_SESSION['login_source'])){
    $login_source = $_SESSION['login_source'];
    unset ($_SESSION['login_source']);

    if($login_source == "japiim"){

    }else{
        header("Location: dic/".$login_source."/index.php");
    }
}



//$_SESSION['login_source'] = "japiim";  
//$_SESSION['login_google'] = "";    

?>
<!DOCTYPE html>
<html lang="pt">
    <?php include "includes/header.php" ?>
    <body id="page-top">
    <?php include ("nav.php"); ?>
          <div id="page-container" class="d-flex flex-wrap align-items-start align-items-sm-baseline flex-lg-row flex-sm-column col-sm-12 col-xl-6 bd-highlight"  style="width: auto; padding:0em; margin:auto; margin-top: 4em; max-width: 600px;">
                <!-- Masthead-->
                <div id="main_panel" class="row h-100 align-items-center justify-content-center text-center">

                <!-- Load Facebook SDK for JavaScript -->
                <!--
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.0";
                fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            -->
                <!-- Your share button code -->
               <!--
                <div class="fb-share-button" 
                data-href="https://japiim.linguasyanomami.com" 
                data-layout="button_count">
                </div>
            -->

                <?php 
                    include ("landing.php");
                ?>
                </div>
            </div>

        
            <?php include "includes/footer.php" ?>
    </body>
</html>
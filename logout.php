<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once ("config.php");

$dic_name = "";

if(isset($_POST["dic_name"])){

        $dic_name = $_POST["dic_name"];

}

//if($_SESSION["gmail"] == 1){

    if($_SESSION['logout_source'] == "japiim"){


        if(isset($_SESSION["accessToken"])){

            $token = $_SESSION["accessToken"];
            $googleClient->revokeToken($token);
            $logout_source = $_SESSION['logout_source'];
           // unset($_SESSION['logout_source']);
           unset($_SESSION['logout_source']);
           
        }elseif(isset($_COOKIE['user_sub'])){






        }

        
        setcookie('user_sub', '', time() - 3600, '/'); // empty value and old timestamp
        setcookie('name', '', time() - 3600, '/'); // empty value and old timestamp
        setcookie('picture', '', time() - 3600, '/'); // empty value and old timestamp
        



        unset($_SESSION['accessToken']);
        unset($_SESSION['email']);
        unset($_SESSION['name']);
        unset($_SESSION['family_name']);
        unset($_SESSION['given_name']);
//        $_SESSION['locale'] = $user_data['locale'];
        unset($_SESSION['user_sub']);
  //      $_SESSION['client_id'] = $user_data['client_id'];
  //      $_SESSION['issuer'] = $user_data['iss'];
  //      $_SESSION['expires_at'] = $user_data['exp'];
   //     $_SESSION['issued_at'] = $user_data['iat'];
    //    $_SESSION['email_verified'] = $user_data['email_verified'];
    unset($_SESSION['picture']);
    unset($_SESSION['user_data']);
        //$_SESSION['gmail'] = 0;
        unset($_SESSION['signup_message']);
        unset($_SESSION['gmail']);





        header("Location: index.php");
        die();


        //exit();    
    }else{


        if(isset($_SESSION["accessToken"])){

            $token = $_SESSION["accessToken"];
            $googleClient->revokeToken($token);
            $logout_source = $_SESSION['logout_source'];
           // unset($_SESSION['logout_source']);
           //unset($_SESSION['logout_source']);
           
        }elseif(isset($_COOKIE['user_sub'])){

        }
        setcookie('user_sub', '', time() - 3600, '/'); // empty value and old timestamp
        setcookie('name', '', time() - 3600, '/'); // empty value and old timestamp
        setcookie('picture', '', time() - 3600, '/'); // empty value and old timestamp

        unset($_SESSION['logout_source']);
        
        //unset($_SESSION['config_search_'.$dic_name]);
        //unset($_SESSION['config_sls_'.$dic_name]);
        //unset($_SESSION['config_tls_'.$dic_name]);



        unset($_SESSION['accessToken']);
        unset($_SESSION['email']);
        unset($_SESSION['name']);
        unset($_SESSION['family_name']);
        unset($_SESSION['given_name']);
//        $_SESSION['locale'] = $user_data['locale'];
        unset($_SESSION['user_sub']);
  //      $_SESSION['client_id'] = $user_data['client_id'];
  //      $_SESSION['issuer'] = $user_data['iss'];
  //      $_SESSION['expires_at'] = $user_data['exp'];
   //     $_SESSION['issued_at'] = $user_data['iat'];
    //    $_SESSION['email_verified'] = $user_data['email_verified'];
    unset($_SESSION['picture']);
    unset($_SESSION['user_data']);
        //$_SESSION['gmail'] = 0;
        unset($_SESSION['signup_message']);
        unset($_SESSION['gmail']);




        $dic_location = "Location: dic/".$logout_source."/index.php";
        unset($_SESSION['logout_source']);
        //session_destroy();
        header($dic_location);
        die();
    }

    
//}else{


//}
    


?>

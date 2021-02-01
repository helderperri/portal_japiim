<?php

require_once("config.php");

if(!isset($_GET['code'])){
    header("Location: index.php");

    die();
}else{
    $token = $googleClient->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION["accessToken"] = $token;
    $user_data = $googleClient->verifyIdToken();
    //$openAuth = new Google_Service_Oauth2($googleClient);
    //$userData = $openAuth->userinfo_v2_me->get();
    $_SESSION['email'] = $user_data['email'];
    $_SESSION['name'] = $user_data['name'];
    $_SESSION['family_name'] = $user_data['family_name'];
    $_SESSION['given_name'] = $user_data['given_name'];
    $_SESSION['locale'] = $user_data['locale'];
    $_SESSION['user_id'] = $user_data['sub'];
    $_SESSION['client_id'] = $user_data['client_id'];
    $_SESSION['issuer'] = $user_data['iss'];
    $_SESSION['expires_at'] = $user_data['exp'];
    $_SESSION['issued_at'] = $user_data['iat'];
    $_SESSION['email_verified'] = $user_data['email_verified'];
    $_SESSION['picture'] = $user_data['picture'];
    $_SESSION['user_data'] = $user_data;
    $_SESSION['profile'] = $user_data['profile'];
    $_SESSION['gmail'] = true;
    header("Location: index.php");
    exit();    
}
  //  
 // echo "<script>window.location.href='secure.php';</script>";


//    echo "ok";
//

//    $google_account_email = $google_oauth->userinfo_v2_me->get();
//    $oauth2 = new Google_Service_Oauth2($googleClient);
//    $userData = $oauth2->userinfo;
  //  


  //  echo $pay_load[""];
//    echo $pay_load["email"];
//    echo $userData["email"];
?>

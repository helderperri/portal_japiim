<?php

require_once("config.php");





if (session_status() == PHP_SESSION_NONE) {
    session_start();
}





if(!isset($_GET['code'])){
    header("Location: index.php");

    die();
    
}else{
    $token = $googleClient->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION["accessToken"] = $token;
    $user_data = $googleClient->verifyIdToken();
    //$openAuth = new Google_Service_Oauth2($googleClient);
    //$userData = $openAuth->userinfo_v2_me->get();
    $user_sub = $user_data['sub'];



    try{
        $result6 = $link->query("SELECT * FROM users WHERE user_sub = '$user_sub'");
    
      } catch(PDOException $e){
        echo "Erro: oi19".$e->getMessage();
      }//try
      
      
      $config_rows = $result6->rowCount();



    if($config_rows > 0){


    }else{


    try {
        //session_start();
        $sql = "INSERT INTO users (user_sub, first_name, last_name, username, email, picture, password, comments, validation_code, active, joined, last_login) 
        VALUES (:user_sub, :first_name, :last_name, :username, :email,  :picture, :password, :comments, 'test', 0, current_date, current_date)";
        $stmnt = $link->prepare($sql);

        $user_data2 = [':user_sub'=> $user_data['sub'], ':first_name'=>$user_data['given_name'],':last_name'=>$user_data['family_name'], ':username'=>$user_data['name'],':password'=>'gmail', ':email'=>$user_data['email'], ':picture'=>$user_data['picture'], ':comments'=>''];
        $stmnt->execute($user_data2);

    } catch(PDOException $e){
        echo "Erro: ".$e->getMessage();
    }

    }

        $_SESSION['accessToken'] = $token;
        $_SESSION['email'] = $user_data['email'];
        $_SESSION['name'] = $user_data['name'];
        $_SESSION['family_name'] = $user_data['family_name'];
        $_SESSION['given_name'] = $user_data['given_name'];
//        $_SESSION['locale'] = $user_data['locale'];
        $_SESSION['user_sub'] = $user_data['sub'];
  //      $_SESSION['client_id'] = $user_data['client_id'];
  //      $_SESSION['issuer'] = $user_data['iss'];
  //      $_SESSION['expires_at'] = $user_data['exp'];
   //     $_SESSION['issued_at'] = $user_data['iat'];
    //    $_SESSION['email_verified'] = $user_data['email_verified'];
        $_SESSION['picture'] = $user_data['picture'];
        $_SESSION['user_data'] = $user_data;
        //$_SESSION['gmail'] = 0;
        $_SESSION['signup_message'] = "Usuário cadastrado com sucesso!";
        //$_SESSION['profile'] = $user_data['profile'];
        $_SESSION['gmail'] = 1;
        //$_SESSION["gmail"] = 1;
        setcookie("user_sub", $user_data['sub'], time()+86400*7);
        setcookie("name", $user_data['name'], time()+86400*7);
        setcookie("picture", $user_data['picture'], time()+86400*7);

        header("Location: index.php");
    


    //if($_SESSION['login_source'] == "japiim"){
      //  unset($_SESSION['login_source']);

    //        header("Location: index.php");
        //exit();    
   // }else{

  //      $dic_location = "Location: dic/".$_SESSION['login_source']."/index.php";
        //unset($_SESSION['login_source']);

    //    header($dic_location);

    //}
}
  

?>
  
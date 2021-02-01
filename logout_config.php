<?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//require_once ("config.php");

    if(isset($_POST['logout_source'])){
        unset($_SESSION['logout_source']);
        $_SESSION['logout_source'] = $_POST['logout_source'];





        $dic_name = "";

        if(isset($_POST["dic_name"])){
        
                $dic_name = $_POST["dic_name"];


                setcookie('user_sub', '', time() - 3600, '/dic/'.$dic_name); // empty value and old timestamp
                setcookie('name', '', time() - 3600, '/dic/'.$dic_name); // empty value and old timestamp
                setcookie('picture', '', time() - 3600, '/dic/'.$dic_name); // empty value and old timestamp


                //unset($_SESSION['config_search_'.$dic_name]);
                //unset($_SESSION['config_sls_'.$dic_name]);
                //unset($_SESSION['config_tls_'.$dic_name]);








        
        }





        //header("Location: logout.php");

    }
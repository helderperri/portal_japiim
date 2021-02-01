<?php
require_once ("config.php");
//include ("connection.php");

?>
                <!-- Signup successfully message-->
                <?php 
                if(isset($_SESSION["signup_message"])){
                    ?>
                <div class="col-lg-8 align-self-end">
                <p class="bg-success text-center"><?php echo $_SESSION["signup_message"]; ?></p>
                </div>
                    <?php
                    unset($_SESSION["signup_message"]);
                 }
                ?>
            <?php

echo generate_token()."<br>";
echo count_field_value($link, 'users', 'username', 'Hselder')."<br>";

?>

                <div class="col-lg-8 align-self-end">
                        <h3 class="text-white-75 font-weight-light mb-5">Conheça as Línguas Indígenas do Brasil</h3>
                                
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                    <a class="btn btn-primary btn-sm" href="#about">Comece a navegar</a>
                                
                    </div>
<?php
                    if(isset($_SESSION["accessToken"])){

   
}else{
    $loginURL = $googleClient->createAuthUrl();


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


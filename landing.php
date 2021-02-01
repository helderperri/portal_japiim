<?php
require_once ("config.php");
//include ("connection.php");

?>
                <!-- Signup successfully message-->
                <?php 
                if(isset($_SESSION["signup_message"])){
                    ?>
                <div class="col-lg-8 align-self-end">
                <p class="bg-success text-center"><?php //echo $_SESSION["signup_message"]; ?></p>
            </div>
                    <?php
                    unset($_SESSION["signup_message"]);
                 }
                ?>
            <?php

//echo  $_SESSION["name"]; 
//echo $_SESSION["picture"];

//echo generate_token()."<br>";
//echo count_field_value($link, 'users', 'username', 'Hselder')."<br>";

?>

                <div class="col-lg-8 align-self-end">
                        <h1 class="text-white-75 font-weight-bold mb-5">Conheça as Línguas Indígenas do Brasil</h1>
                                
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <!--
                    <a class="btn btn-primary btn-sm" href="#about">Comece a navegar</a>
                -->    
                    </div>

<?php
require_once ("config.php");


?>
<!DOCTYPE html>
<html lang="pt">
    <?php include "includes/header.php" ?>
    <body id="page-top">
    <div id="nav_all" class="m-0 p-0">
        <?php include ("nav.php"); ?>
    </div>
        <header class="col-12 masthead">
            <div class="container h-100">
                <!-- Masthead-->
                <div id="main_panel" class="row h-100 align-items-center justify-content-center text-center">

                <?php 
                    include ("landing.php");
                ?>
                </div>
            </div>

        </header>
        
        <?php include "includes/footer.php" ?>
    </body>
</html>
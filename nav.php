    <?php
    require_once ("config.php");

        $username = "";
        $user_picture = "";
  

        
    ?>
        <nav role='navigation' class='navbar navbar-expand-md navbar-toggleable-sm navbar-custom bg-light' id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="assets/img/logo_prodoclin_texto_mini.png" alt=""></a>

                
          <button class="navbar-toggler ml-auto navbar-light" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          
          <span class="navbar-toggler-icon"></span>
      
        </button>
      
      
      
        <div class="collapse navbar-collapse" id="navbarCollapse">
      


                
                    <ul class="nav navbar-nav">
                    <li class="nav-item"><a id="search_dics" class="nav-link" href="#">Buscar nos dicionários</a></li>
                        <!--
                        <li class="nav-item"><a id="page_0" class="nav-link" href="#">Page 0</a></li>
                        <li class="nav-item"><a id="page_2"class="nav-link" href="#">Page 2</a></li>
                        <li class="nav-item"><a id="page_3" class="nav-link" href="#">Page 3</a></li>
-->
                    </ul>
                    <ul class="navbar-nav navbar-right">
                    <li class="nav-item dropdown order-2 order-lg-1">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dicionários
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="dic/arutani/index.php" target="_blank">Arutani</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="dic/baniwa-koripako/index.php" target="_blank">Baniwa-Koripako</a></li>
                                <li class="nav-item dropdown-item "><a class="nav-link dic" href="dic/galibi-marworno/index.php" target="_blank">Galibi-Marworno</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="dic/guato/index.php" target="_blank">Guató</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="dic/kawahiva/index.php" target="_blank">Kawahiva</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="dic/karaja/index.php" target="_blank">Karajá</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="dic/karipuna/index.php" target="_blank">Karipuna</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="dic/kheuol/index.php" target="_blank">Kheuól</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="dic/korubo/index.php" target="_blank">Korubo</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="dic/morekuyubim/index.php" target="_blank">Moré-Kuyubim</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="dic/sanoma/index.php" target="_blank">Sanöma</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="dic/taurepang/index.php" target="_blank">Taurepang</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="dic/werekena/index.php" target="_blank">Werekena</a></li>
                                <li class="nav-item dropdown-item disabled"><a class="nav-link dic" ref="dic/xinaneyura/index.php" href="javascript:void(0)" target="_blank">Xinane Yura</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link dic" href="dic/yekwana/index.php" target="_blank">Ye'kwana</a></li>



                            </ul>
                        </li>

                        <li class="nav-item dropdown order-3 order-lg-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ferramentas 
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                    
                                <li class="nav-item dropdown-item"><a class="nav-link " href="https://linguasyanomami.com/portaljapiim/#tecladospc" target="_blank">Teclados para PC</a></li>
                                <li class="nav-item dropdown-item"><a class="nav-link " href="https://play.google.com/store/apps/developer?id=Portal+Japiim+-+Prodoclin&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1" target="_blank">Teclados para Android</a></li>



                            </ul>
                        </li>
                        <li class="nav-item order-4 order-lg-3"><a class="nav-link" rel="noopener noreferrer" target="_blank" href="http://prodoclin.museudoindio.gov.br/index.php/projetos">Prodoclin</a></li>

                    </ul>

                        <?php
                //if(isset($_SESSION["accessToken"]) or isset($_POST["otherToken"])){
                        if(isset($_SESSION["name"])){
                            $username = $_SESSION['name'];
                            $user_picture = $_SESSION['picture'];
                        ?>
                    <ul class="navbar-nav navbar-left ml-auto">

                        <li class="nav-item dropdown order-1 order-lg-4 ml-auto">
                                <a class="nav-link dropdown-toggle" href="#" id="user_nav" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <img src="<?php echo $user_picture;?>" width="25" height="25" class="rounded-circle">
                                  <?php echo $username;?></a>

                        <ul class="dropdown-menu" aria-labelledby="user_nav" style="background-color: transparent;">                           

                                    <li class="nav-item dropdown-item"><a class="nav-link " ref='secure.php' href="javascript:void(0)" >Conta</a></li>
                                    <li class="nav-item dropdown-item"><a class="nav-link " ref='secure.php' href="javascript:void(0)" >Notificações</a></li>
                                    <li class="nav-item dropdown-item"><a class="nav-link " id="users_words" href='#' ref="javascript:void(0)" >Palavras</a></li>
                                    
                                    <div class="dropdown-divider"></div>
                                    
                                    <li class="nav-item dropdown-item"><a class="nav-link " id="logout_link" href='#' >Sair</a></li>
    
    
    
                                </ul>
                        </li>
                        </ul>

                        <?php


                    }else{
                        ?>
                    <ul class="navbar-nav navbar-left ml-auto">
                        <li class="nav-item order-1 order-lg-4" ><a id="login_link" class="nav-link js-scroll-trigger" href="#">Entrar</a></li>
                       <!--
                           <li class="nav-item order-1 order-lg-4"><a id="register_link" class="nav-link js-scroll-trigger" href="#">Cadastro</a></li> 
                    -->
                        </ul>

                        <?php
                    }
            ?>     
                </div>
            </div>
        </nav>
<script> 





$( document ).ready(function(){
    /*
    $(".dic").click(function(){

var dic_name = $(this).attr('dic_lang');
var url_tg = "/japiim/dic/index.php";

$.redirect(url_tg, {dic_name:dic_name}); 
console.log(url_tg);
console.log(dic_name);

});
*/
    $("#register_link").click(function(){

    $.ajax({
      url:'register.php',
      data:{},
      type: 'GET',
      success: function(data){
          if(!data.error){
              $('#main_panel').html(data);
  
          }
      }

    })
      



});


$("#login_link").click(function(){

$.ajax({
  url:'login.php',
  data:{},
  type: 'GET',
  success: function(data){
      if(!data.error){
          $('#main_panel').html(data);

      }
  }

})
  



});



$("#logout_link").click(function(){
var logout_session=1
var logout_source = "japiim"
$.ajax({
  url:'logout_config.php',
  data:{logout_source:logout_source},
  type: 'POST',
  success: function(data){
      if(!data.error){
        window.location.href = "logout.php";

      }
  }

})
  



});



$("#page_0").click(function(){

$.ajax({
  url:'landing.php',
  data:{},
  type: 'GET',
  success: function(data){
      if(!data.error){
          $('#main_panel').html(data);

      }
  }

})
  



});



$("#search_dics").click(function(){

$.ajax({
  url:'search_dics.php',
  data:{},
  type: 'GET',
  success: function(data){
      if(!data.error){
          $('#main_panel').html(data);

      }
  }

})
  



});




$("#users_words").click(function(){

$.ajax({
  url:'users_words.php',
  data:{},
  type: 'GET',
  success: function(data){
      if(!data.error){
          $('#main_panel').html(data);

      }
  }

})
  



});


$("#page_1").click(function(){

$.ajax({
  url:'page1.php',
  data:{},
  type: 'GET',
  success: function(data){
      if(!data.error){
          $('#main_panel').html(data);

      }
  }

})
  



});


$("#page_2").click(function(){

$.ajax({
  url:'page2.php',
  data:{},
  type: 'GET',
  success: function(data){
      if(!data.error){
          $('#main_panel').html(data);

      }
  }

})
  



});

$("#page_3").click(function(){

$.ajax({
  url:'page3.php',
  data:{},
  type: 'GET',
  success: function(data){
      if(!data.error){
          $('#main_panel').html(data);

      }
  }

})
  



});


});
</script>

<?php

?>
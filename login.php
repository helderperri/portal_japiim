<?php

    require_once ("config.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    $loginURL = "";

    if(!isset($_SESSION["accessToken"])){

        $loginURL = $googleClient->createAuthUrl();

        }

?>

                <div class="col-12 col-md-offset-3">
                    <div class="panel panel-login">
					    <div class="panel-body">
						    <div class="row">
							    <div class="col-lg-12">
                                    <!--
								    <form id="login-form"  method="post" role="form" style="display: block;">
									    <div class="form-group">
										    <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" required>
									    </div>
									    <div class="form-group">
										    <input type="password" name="password" id="login-
										password" tabindex="2" class="form-control" placeholder="Password" required>
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                            <label for="remember">Stay logged in</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-custom" value="Log In">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="recover.php" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    -->
                                    
                                    <div>

                                        <p class="text-white-75 font-weight-light mb-5 p-4">
                                        <strong style="display: inline-block; vertical-align: center;">Faça o seu login com:</strong>
                                        <a href="#"><img src="icons/btn_google_signin_light_normal_web_short.png" style="height: 40px;" id="login_google" loginurl = "<?php echo $loginURL; ?>"></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
       
<script>

$("#login_google").on("click", function(){

    var loginurl = $(this).attr("loginurl");
    var login_source = "japiim";
    var login_google = 1;
    console.log(loginurl)

    
    $.ajax({
        url:'login_config_session.php',
        data:{login_source:login_source, login_google:login_google},
        type: 'POST',
        success: function(data){
            if(!data.error){            
                //window.open(loginurl);        
                window.location.href = loginurl;

            }
        }
        



    })
})
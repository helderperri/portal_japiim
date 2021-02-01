<?php 
 //   include ("connection.php");
    require_once ("config.php");
    $loginURL = "";

    if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }else{
  }

    if(!isset($_SESSION["accessToken"])){

        $loginURL = $googleClient->createAuthUrl();
   
    }



    if($_SERVER['REQUEST_METHOD']=="POST"){ 


        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $confirm_email = $_POST['confirm_email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $comments = $_POST['comments'];



        if(!isset($_SESSION["gmail"])){


        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $confirm_email = $_POST['confirm_email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $comments = $_POST['comments'];

        if(strlen($first_name)<1){
            $first_name_error = "O sobrenome não pode estar em branco.";
            $error[] = $first_name_error;
        }

        if(strlen($last_name)<1){
            $last_name_error = "O sobrenome não pode estar em branco.";
            $error[] = $last_name_error;
        }

        if(strlen($username)<6){

            $username_error1 = "O nome do usuário deve ter ao menos 6 letras ou números.";
            $error[] = $username_error1;
        }

        if(strlen($password)<6){
            $password_error = "A senha deve ter ao menos 6 letras ou números.";
            $error[] = $password_error;
        }

        if($password != $confirm_password){
            $confirm_password_error = "As senhas não conferem.";
            $error[] = $confirm_password_error;

        }

        if($email != $confirm_email){

            $error[] = "Os endereços de email não são iguais";
            $confirm_email_error = "Os endereços digitados não conferem.";
            $error[] = $confirm_email_error;

        }
        


        if(count_field_value($link, 'users', 'username', $username) != 0){

            $username_error2 = "O nome do usuário <b>$username</b> já existe.";
            $error[] = $username_error2;  
        }



        if(count_field_value($link, 'users', 'email', $email) != 0){

            $email_error2 = "O endereço de email <b>$email</b> já está cadastrado. Faça o login agora.";
            $error[] = $email_error2;   
        
        }



    }  

        if(!isset($error)){
            try {
                //session_start();
                $sql = "INSERT INTO users (first_name, last_name, username, email, password, comments, validation_code, active, joined, last_login) 
                VALUES (:first_name, :last_name, :username, :email,  :password, :comments, 'test', 0, current_date, current_date)";
                $stmnt = $link->prepare($sql);
                $user_data = [':first_name'=>$first_name,':last_name'=>$last_name, ':username'=>$username,':password'=>$password,':email'=>$email, ':comments'=>$comments];
                $stmnt->execute($user_data);
                $token = "full form signup";
                $_SESSION["accessToken"] = $token;
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $username;
                $_SESSION['family_name'] = $last_name;
                $_SESSION['given_name'] = $first_name;
                //$_SESSION['locale'] = $user_data['locale'];
                //$_SESSION['user_id'] = $user_data['sub'];
                //$_SESSION['client_id'] = $user_data['client_id'];
                //$_SESSION['issuer'] = $user_data['iss'];
                //$_SESSION['expires_at'] = $user_data['exp'];
                //$_SESSION['issued_at'] = $user_data['iat'];
                //$_SESSION['email_verified'] = $user_data['email_verified'];
                $_SESSION['picture'] = "icons/right.png";
                $_SESSION['user_data'] = $user_data;
                $_SESSION['gmail'] = 0;
                $_SESSION['signup_message'] = "Usuário cadastradosss com sucesso!"
                //$_SESSION['profile'] = $user_data['profile'];
            







                ?>
                <script>
                $.ajax({
                    url: "nav.php",
                    data: {},
                    type: 'POST',
                    success: function(data){
                        if(!data.error){
                            $('#nav_all').html(data);
                        }
                    }
                
                })
        
                $.ajax({
                  url: "landing.php",
                  data: "",
                  type: 'POST',
                  success: function(data){
                      if(!data.error){
                          $('#main_panel').html(data);
              
                      }
                  }
              
              })
              

                </script>


                <?php



            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }

        }
        

    }else{

        //echo "Nenhum dado tipo POST";

    }


?>
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="panel panel-register">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="register_form" action="register.php" method="post" role="form" >
                            <div class="form-group">
                                <input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" placeholder="Nome" value="<?php if(isset($first_name)){echo $first_name;}?>" required >
                                <?php
                                    if(isset($first_name_error)){

                                        echo "<p class='bg-danger text-center'>".$first_name_error."</p>";
                                    }
                            ?>

                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" id="last_name" tabindex="2" class="form-control" placeholder="Sobrenome" value="<?php if(isset($last_name)){echo $last_name;}?>" required >
                                <?php
                                    if(isset($last_name_error)){

                                        echo "<p class='bg-danger text-center'>".$last_name_error."</p>";
                                    }
                            ?>
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" id="username" tabindex="3" class="form-control" placeholder="Nome de usuário" autocomplete="username" value="<?php if(isset($username)){echo $username;}?>" required >
                                <?php
                                    if(isset($username_error1)){

                                        echo "<p class='bg-danger text-center'>".$username_error1."</p>";
                                    }

                                    if(isset($username_error2)){

                                        echo "<p class='bg-danger text-center'>".$username_error2."</p>";
                                    }

                            ?>

                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="register_email" tabindex="4" class="form-control" placeholder="Endereço de email" autocomplete="email" value="<?php if(isset($email)){echo $email;}?>" required >
                                <?php
                                    if(isset($email_error)){

                                        echo "<p class='bg-danger text-center'>".$email_error."</p>";
                                    }

                                    if(isset($email_error2)){

                                        echo "<p class='bg-danger text-center'>".$email_error2."</p>";
                                    }

                            ?>

                            </div>
                            <div class="form-group">
                                <input type="email" name="confirm_email" id="confirm_register_email" tabindex="4" class="form-control" autocomplete="email" placeholder="Confirme seu endereço de email" value="<?php if(isset($confirm_email)){echo $confirm_email;}?>" required >
                                <?php
                                    if(isset($confirm_email_error)){

                                        echo "<p class='bg-danger text-center'>".$confirm_email_error."</p>";
                                    }
                            ?>

                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" tabindex="5" class="form-control" placeholder="Senha" autocomplete="new-password" value="<?php if(isset($password)){echo $password;}?>" required>
                                <?php
                                    if(isset($password_error)){

                                        echo "<p class='bg-danger text-center'>".$password_error."</p>";
                                    }
                            ?>
   
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm_password" id="confirm_password" tabindex="6" class="form-control" placeholder="Confirme a senha" autocomplete="new-password" value="<?php if(isset($confirm_password)){echo $confirm_password;}?>" required>
                                <?php
                                    if(isset($confirm_password_error)){

                                        echo "<p class='bg-danger text-center'>".$confirm_password_error."</p>";
                                    }
                            ?>
                            </div>
                            <div class="form-group">
                                <textarea name="comments" id="comments" tabindex="7" class="form-control" placeholder="Commentários"><?php if(isset($comments)){echo $comments;}?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="register_submit" id="register_submit" tabindex="4" class="form-control btn btn-success" value="Cadastrar-se">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div>

                            <p class="text-white-75 font-weight-light mb-5 p-4">
                            <strong style="display: inline-block; vertical-align: center;">Faça o seu cadastro com:</strong>
                            <img src="icons/btn_google_signin_light_normal_web_short.png" style="height: 40px;" onclick="window.location.href = '<?php echo $loginURL; ?>'">
                            </p>
                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
    

    <script>
    $('#register_form').submit(function(e){
        e.preventDefault();
        var form = $(this);
        var url = form.attr("action");      

        $.ajax({
                  url: url,
                  data:form.serialize(),
                  type: 'POST',
                  success: function(data){
                      if(!data.error){
                          $('#main_panel').html(data);
              
                      }
                  }
                  
              
              
              
              })
              
              
              
              
              
              
              });
            
    
    </script>

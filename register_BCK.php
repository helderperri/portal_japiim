<?php 
    include ("connection.php");


    if($_SERVER['REQUEST_METHOD']=="POST"){ 

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $confirm_email = $_POST['confirm_email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $comments = $_POST['comments'];

        if(strlen($last_name)<3){
            $error[] = "O sobrenome deve conter ao menos 3 caracteres";
        }

        if(strlen($username)<5){
            $error[] = "O nome do usuário deve ter ao menos 5 caracteres";
        }

        if(strlen($password)<6){
            $error[] = "A senha deve ter ao menos 6 caracteres";
        }

        try {
            $sql = "INSERT INTO users (first_name, last_name, username, email, password, comments, validation_code, active, joined, last_login) 
            VALUES (:first_name, :last_name, :username, :email,  :password, :comments, 'test', 0, current_date, current_date)";
            $stmnt = $link->prepare($sql);
            $user_data = [':first_name'=>$first_name,':last_name'=>$last_name, ':username'=>$username,':password'=>$password,':email'=>$email, ':comments'=>$comments];
            $stmnt->execute($user_data);
 //           echo "Cadastro do novo usuário realizado";

        } catch(PDOException $e){
            echo "Erro: ".$e->getMessage();
        }


    }else{
        //echo "Nenhum dado tipo POST";
    }


?><!DOCTYPE html>
<html lang="pt">
    <?php include "includes/header.php" ?>
    <body id="page-top">

        <?php include "nav.php" ?>

        <!-- Masthead-->
        <header class="col-12 masthead">
            <div class="container h-100">
                <div id="main_panel" class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-6">
                        <form id="register-form" method="post" role="form" >
                            <div class="form-group">
                                <input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" placeholder="Nome" value="" required >
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" id="last_name" tabindex="2" class="form-control" placeholder="Sobrenome" value="" required >
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" id="username" tabindex="3" class="form-control" placeholder="Nome de usuário" value="" required >
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="register_email" tabindex="4" class="form-control" placeholder="Endereço de email" value="" required >
                            </div>
                            <div class="form-group">
                                <input type="email" name="confirm_email" id="confirm_register_email" tabindex="4" class="form-control" placeholder="Confirme seu endereço de email" value="" required >
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" tabindex="5" class="form-control" placeholder="Senha" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm_password" id="confirm-password" tabindex="6" class="form-control" placeholder="Confirme a senha" required>
                            </div>
                            <div class="form-group">
                                <textarea name="comments" id="comments" tabindex="7" class="form-control" placeholder="Commentários"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-success" value="Cadastrar-se">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <?php include "includes/footer.php" ?>
    </body>
</html>
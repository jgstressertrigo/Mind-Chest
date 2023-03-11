<?php
 require_once 'classe.php';
 $u = new usuario();

 if(isset($_POST['usuario'])){
     $usuario = addslashes($_POST['usuario']);
     $senha = addslashes($_POST['senha']);
     /*echo "login: ".$login.", senha: ".$senha;
     echo "";*/
     if(!empty($usuario) && !empty($senha)){
         $u->conectar('login_mindchest','localhost','root',''); 
         //echo "msg: ".$msg;
         if($u->msg == ""){
             if($u->logar($usuario,$senha)){
               $_COOKIE['usuario']= $_POST['usuario'];
               echo "variavel global: ".$_COOKIE['usuario'];
               $_SESSION['usuario'] = $usuario;
               $_SESSION['senha'] = $senha;
               session_start();
               header("location: perfil.php");
             }else{
                 echo "<script language='javascript' type='text/javascript'>alert('Não foi possivel logar no sistema!')</script>";
                 echo "<script language='javascript' type='text/javascript'>window.location.href='login.html';</script>";
             }
         }else{
             echo "Erro: ".$u->msg;
         }
     }else {
         echo "<script language='javascript' type='text/javascript'>alert('Preenha todos os campos!')</script>";
         echo "<script language='javascript' type='text/javascript'>window.location.href='login.php';</script>";
     }
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelog.css">
    <link rel="shortcut icon" href="pigface.ico">
    <title>Mind Chest</title>
</head>
<body>
    <header>
        <nav>
            <a class="logo" href="/site_mindchest/site.php">Mind Chest</a>
            <ul class="nav-list">
                <li><a href="/site_mindchest/site.php">Jogar</a></li>
                <li><a href="/sobre_mindchest/sobre.php">Sobre</a></li>
                <li><a href="/login_mindchest/login.php">Login</a></li>
                <li><a href="/contato_mindchest/contato.php">Perfil</a></li>
            </ul>
        </nav>
    </header>
    <div class="main-login">
        <div class="left-login">
            <img src="logo.png" alt="logomindchest" width="50%">
            <h1>Mind Chest</h1>
        </div>    
        <div class="right-login">
            <form id="form_login" method="post" action="" class="card-login">
                <h1>Login</h1>
                <div class="textfield">
                    <label for="usuario" >Usuário</label>
                    <input type="text" name="usuario"  id="usuario" placeholder="Usuário" >
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha">
                </div>
                <button class="btn-login" type="submit" id="btn">Entrar</button>
                <p>Não possui login ?<a href="/cadastro_mindchest/cadastro.php"> Cadastre-se.</a></p>
            </form>
        </div>
    </div>
</html>
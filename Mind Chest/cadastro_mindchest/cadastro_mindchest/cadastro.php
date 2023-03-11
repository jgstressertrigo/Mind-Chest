<?php
require_once 'classe.php';
$u = new usuario();

if(isset($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $usuario = addslashes($_POST['usuario']);
    $senha = addslashes($_POST['senha']);

    if(!empty($nome) && !empty($email) && !empty($usuario) && !empty($senha)){
        $u->conectar('login_mindchest','localhost','root',''); 
        echo '$msg';
        if($u->msg == ""){
            if($u->cadastrar($nome,$email,$usuario,$senha)){
                echo "<script language='javascript' type='text/javascript'>alert('O usuario foi cadastrado com sucesso!')</script>";
                echo "<script language='javascript' type='text/javascript'>window.location.href='login.php'</script>";
            }else{
                echo "<script language='javascript' type='text/javascript'>alert('O usuario já está cadastrado no sistema. Tente outro!')</script>";
                echo "<script language='javascript' type='text/javascript'>window.location.href='cadastro.php';</script>";
            }
        }else{
            echo "Erro: ".$u->msg;
        }
    }else {
        echo "<script language='javascript' type='text/javascript'>alert('Preenha todos os campos!')</script>";
        echo "<script language='javascript' type='text/javascript'>window.location.href='cadastro.html';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylecad.css">
    <link rel="shortcut icon" href="pigface.ico">
    <title>Cadastre-se</title>
</head>
<body>
    <header>
        <nav>
            <a class="logo" href="/site_mindchest/site.php">Mind Chest</a>
            <ul class="nav-list">
                <li><a href="/site_mindchest/site.php">Jogar</a></li>
                <li><a href="/sobre_mindchest/sobre.php">Sobre</a></li>
                <li><a href="/login_mindchest/login.php">Login</a></li>
                <li><a href="/contato_mindchest/contato.php">Contato</a></li>
            </ul>
        </nav>
    </header>
    <div class="main-cadastro">
        <div class="left-cadastro">
            <img src="logo.png" alt="logomindchest" width="50%">
            <h1>Mind Chest</h1>
            </div>    
        <div class="right-cadastro">
            <form method="POST" class="card-cadastro">
                <h1>CADASTRE-SE</h1>
                <div class="textfield">
                    <label for="nome" >Nome</label>
                    <input type="text" name="nome"  id="nome" placeholder="Nome completo" maxlength="30">
                </div>
                <div class="textfield">
                    <label for="email" >Email</label>
                    <input type="text" name="email"  id="email" placeholder="E-mail" maxlength="40">
                </div>
                <div class="textfield">
                    <label for="usuario" >Usuário</label>
                    <input type="text" name="usuario"  id="usuario" placeholder="Usuário" maxlength="20">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha">
                </div>
                <input class="btn-cadastro" type="submit" id="btn"></input>
                <p>Já possui uma conta?<a href="login.php"> Clique aqui.</a></p>
            </form>
</div>
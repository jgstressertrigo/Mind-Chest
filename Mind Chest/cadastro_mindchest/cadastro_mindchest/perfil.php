<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <header>
            <nav>
            <a class="logo" href="/projeto_mindchest/site_mindchest/site.php">Mind Chest</a>
            <ul class="nav-list">
            <li><a href="/projeto_mindchest/site_mindchest/site.php">Jogar</a></li>
            <li><a href="/projeto_mindchest/sobre_mindchest/sobre.php">Sobre</a></li>
            <li><a href="/projeto_mindchest/cadastro_mindchest/login.php">Login</a></li>
            <li><a href="/projeto_mindchest/cadastro_mindchest/perfil.php">Perfil</a></li>
             </ul>
                            </nav>
                        </header>   
</html>

<?php 
require_once 'classe.php';
session_start();       
            if(isset($_SESSION['usuario'])){
                ?>
                <html>
                    <body>   
                        <div class="container">   
                            <div class="card">
                            <div class="desc">
                                <h1 class="name">
                                    <?php echo "Bem-vindo " .  $_SESSION['usuario'] . "<br>";
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </body>
                </html>
            <?php
    }
?>
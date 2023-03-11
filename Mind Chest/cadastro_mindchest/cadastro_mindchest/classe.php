<?php

    Class Usuario{
            
        private $pdo;
        public $msg = "";

        public function conectar($dbname,$host,$usuario,$senha){
            global $pdo;
            try {                
                $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $usuario, $senha);
                
            } catch (PDOException $erro) {
                global $msg;
                $msg = $erro->getMessage();
            }
            
        }
        
        public function cadastrar($nome,$email,$usuario,$senha){
            global $pdo;
            $senhaMD5=MD5($senha);
            //  Verifica se já existe
            $sql = $pdo -> prepare("SELECT id_usuario FROM cadastros WHERE usuario = $usuario");
            $sql->execute;
            if($sql->rowCount() > 0){
                // já existe
                return false;
            }else{
                // não existe, cadastrar
                $sql = $pdo->prepare("INSERT INTO cadastros (id_usuario,nome,email,usuario,senha) VALUES ('','$nome','$email','$usuario','$senhaMD5')");
                $sql->execute();
                return true;
            }
            
        }

        public function logar($usuario,$senha){
            global $pdo;
            $senhaMD5=MD5($senha);
            // //  Verifica se está cadastrado
            $sql = $pdo->prepare("SELECT id_usuario FROM cadastros WHERE usuario = '$usuario' AND senha = '$senhaMD5'");
            $sql->execute();
            if($sql->rowCount() > 0){
                // está cadastrado
                $dado = $sql -> fetch();
                session_start();
                $_SESSION['id_usuario'] = $dado['usuario'];
                return true;
            }else{
                // não está cadastrado
                return false;
            }
        }
        public function editar($newnome,$newemail,$newusuario,$newsenha){
            global $pdo;
            $sql = $pdo->prepare("UPDATE cadastros SET (nome,email,usuario,senha) VALUES($newnome,$newemail,$newusuario,$newsenha)");
            $sql->execute();
            return true;

        }
    }



?>
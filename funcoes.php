<?php 
    include_once 'conexao.php';
    session_start();
    /*
        Logar
    */
    function logar($nome, $senha){    
        $conn = conexao();

        $sql = "SELECT * FROM users WHERE nome='$nome' AND senha= '$senha'; ";

        $consulta = $conn->query($sql);

        if($consulta != NULL){
            $user  = $consulta->fetch_array();
            if($user != NULL){
                $_SESSION['log'] = $user;
                echo ("
                <script>
                    window.alert('logado com sucesso');
                </script>
                ");
                echo "<script>";
					echo "$(document).ready(function(){";
					echo "$('#openForm').hide();";
					echo "$('#btnsair').show();";
					echo "});";
					echo "</script>";
            }else{
                echo 'usuario ou senha incorretos';
            }
        }
    }
    /*
        cadastrar
    */
    function cadastrar($nome, $email, $senha){
        $conn = conexao();
        
        $sql = " SELECT COUNT(*) FROM users WHERE nome='$nome'";

        $consulta = $conn->query($sql);

        $numero = $consulta->fetch_array();

        if($numero[0] >= 1){
            echo ("
                <script>
                    window.alert('Nome de usuario indisponível');
                </script>
            ");
        }else{
            $sql = " INSERT INTO users(id, nome, email, senha, pontos, rank, tipo) VALUES ('','$nome','$email','$senha', 0, '', 0)";
            
            $resultado = $conn->query($sql);
            if($resultado != NULL){
                echo ("
                    <script>
                        window.alert('Usuario cadastrado com sucesso !');
                    </script>
                ");
            }
            
        }
    }


?>
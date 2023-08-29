<?php 
    include_once 'conexao.php';
    session_start();
    $conn = conexao();
    if(isset($_GET['excluir'])){
        
        $sql = "TRUNCATE TABLE pife.ranking";

        $query = mysqli_query($conn, $sql);
    }
    if(isset($_POST['enviar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "UPDATE usuario SET 
        Nome = '$nome', email = '$email', senha = '$senha' WHERE `usuario`.`Nome` = 'gabriel';";

        $query = mysqli_query($conn, $sql);

        header('Location:perfil.php');
    }
?>
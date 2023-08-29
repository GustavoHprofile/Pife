<?php
	session_start();
	if(isset($_SESSION['log'])){
		$nomeusr = $_SESSION['log'];
	}

$jogadoresGeral = array();
$jogadoresSemanal = array();

function conexao()
{
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $bcd = 'pife';

    $conn = mysqli_connect($host, $user, $password, $bcd);

    if ($conn->connect_error){
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    function reportar($conn){
        $query = "SELECT * FROM erro";
        $user = mysqli_query($conn, $query);
        $ass = $_POST['assunto'];
        $desc = $_POST['descricao'];
        $query = "INSERT INTO erro(Nome, Assunto, Descricao) VALUES ('$nomeusr', '$ass', '$desc')";
        $inserido = mysqli_query($conn, $query);

        if($inserido){
			echo '<script>';
			echo '$(document).ready(function(){';
			echo 'alert("inserido com sucesso.");';
			echo '});';
			echo '</script>';
        }else{
			echo '<script>';
			echo '$(document).ready(function(){';
			echo 'alert("falha ao inserir.");';
			echo '});';
			echo '</script>';
        }
        return;
    }

	if(isset($_POST['reportar'])){
		$conn = conexao();
		reportar($conn);
	}
}
?>
<html>
	<head>
		<title>Ranking</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<link rel="stylesheet" href="resources/icones.css" type="text/css">
		<link rel="stylesheet" href="resources/popup.css" type="text/css">
		<link rel="icon" type="image/png" href="resources/fav1.png">
		<script src="resources/jquery-3.7.0.js"></script>
		<script src="resources/favicon.js"></script>
		<script>
			function fechar(){
				window.close();
			}

			$(document).ready(function(){
				$("#btn-geral").click(function(){
					$("#nav1").show();
					$("#nav2").hide();
					$("#btn-semana").css("background-color", "#555353");
					$("#btn-geral").css("background-color", "red");
				});
			});

			$(document).ready(function(){
				$("#btn-semana").click(function(){
					$("#nav1").hide();
					$("#nav2").show();
					$("#btn-semana").css("background-color", "red");
					$("#btn-geral").css("background-color", "#555353");
				});
			});
		</script>
	</head>
	<body>
		<center style="margin-bottom: 20px;">
			<i class="fas fa-exclamation-circle" style="display: inline-block; font-size: 28px;"></i>
			<span class="rank" style="margin-left: -15px;">REPORTAR ERRO</span>	
		</center>
		<form method="post" action="#">
			<label for="assunto">Assunto:</label>
			<input type="text" name="assunto" id="assunto" title="assunto" class="button" style="height: 30px; font-size: 16px; margin-top: 10px;">
			<label for="descricao">Descrição:</label>
			<textarea name="descricao" id="descricao" title="descrição" class="button" style="resize: none; height: 294px; font-size: 16px; margin-top: 10px;"></textarea>
			<div class="btnbox">
				<label for="reportar"><button id="btnrep" style="background-color: #555353;">Enviar</button></label>
				<input type="submit" name="reportar" id="reportar" style="display: none;">
				<button onclick="fechar()">Fechar</button>
			</div>
		</form>
	</body>
</html>
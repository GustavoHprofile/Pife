<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pife";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
?>
<html lang="pt-br">
	<head>
		<title>Admin</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<link rel="stylesheet" href="resources/admin.css" type="text/css">
		<link rel="stylesheet" href="resources/icones.css" type="text/css">
		<link rel="icon" type="image/png" href="resources/fav1.png">
		<script src="resources/jquery-3.7.0.js"></script>
		<script src="resources/favicon.js"></script>
		<script>
			function limpar(){
				if(confirm("Tem certeza que deseja limpar o ranking dos usuários?")){
					var xhr = new XMLHttpRequest();
					xhr.open('GET', 'teste.php?excluir', true);

					xhr.onload = function() {
					if (xhr.status === 200) {
						// A requisição foi bem-sucedida
						var resposta = xhr.responseText;
						console.log(resposta);
						// Faça algo com a resposta do PHP
					} else {
						// Ocorreu um erro na requisição
						console.log('Erro na requisição. Código de status: ' + xhr.status);
					}
					};
					xhr.send();
				}
			}
			
			$(document).ready(function(){
				$("#btban").click(function(){
					$("#dvban").toggle();
				});
			});
			
			$(document).ready(function(){
				$("#bterr").click(function(){
					$("#dverr").toggle();
				});
			});
			
			$(document).ready(function(){
				$("#btgusr").click(function(){
					$("#dvgusr").toggle();
				});
			});
			
			function sair(){
				if(confirm("Tem certeza que deseja sair?")){
					window.location.href = '?logout';
					window.close();
				}
			}
		</script>
	</head>
	<body>
		<center style="margin: 20px;">
			<i class="material-icons" style="display: inline-block; font-size: 32px;">verified_user</i>
			<span class="admin" style="position: relative; top: 2px; left: -15px;">ADMINISTRADOR</span>
		</center>
		<?php
		if (isset($_POST['clrrank'])) {
			// Consulta para apagar os registros da coluna "semana" na tabela "semanal"
			$sql = "DELETE FROM semanal";

			if ($conn->query($sql) === TRUE) {
				echo '<script>';
				echo '$(document).ready(function(){';
				echo 'alert("Registros apagados com sucesso.");';
				echo '});';
				echo '</script>';
			} else {
				echo '<script>';
				echo '$(document).ready(function(){';
				echo 'alert("Erro ao apagar os registros: ' . $conn->error . '");';
				echo '});';
				echo '</script>';
			}
		}
		?>
		<form method="post" style="margin: 0; padding: 0;">
			<input type="submit" id="btnapaga" name="apagar_registros" value="Apagar Registros" class="button" style="display: none;">
			<button onclick="limpar()">Limpar Ranking</button>
		</form>
		<button id="btban">Banir/desbanir jogador</button>
		<div id="dvban" class="divoculta">
			<ol style="padding-left: 25; padding-right: 10;">
			<?php
			// Executa a consulta
			$sql = "SELECT * FROM usuario";
			$result = $conn->query($sql);

			// Verifica se há registros retornados
			if ($result->num_rows > 0) {
				// Exibe os dados de cada usuário
				while ($row = $result->fetch_assoc()) {
					echo "<li>" . $row["Nome"] . "<input type='checkbox' style='float: right; margin-right: 10px;'></li><br>";
				}
			} else {
				echo "Nenhum usuário encontrado.";
			}
			?>
			</ol>
		</div>
		<br>
		<button id="bterr">Erros reportados</button>
		<div id="dverr" class="divoculta">
		</div>
		<br>
		<button id="btgusr">Gerenciar Usuários</button>
		<div id="dvgusr" class="divoculta">
			<br>
			<?php
			// Executa a consulta
			$sql = "SELECT * FROM usuario";
			$result = $conn->query($sql);

			// Verifica se há registros retornados
			if ($result->num_rows > 0) {
				// Exibe os dados de cada usuário
				while ($row = $result->fetch_assoc()) {
					echo "Nome: " . $row["Nome"] . "<br>";
					echo "Email: " . $row["email"] . "<br>";
					echo "Senha: " . $row["senha"] . "<br>";
					echo "<br>";
				}
			} else {
				echo "Nenhum usuário encontrado.";
			}

			// Fecha a conexão com o banco de dados
			$conn->close();
			?>
			<form action="#" method="POST">
				<center>
					<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
					<label for="nome">Nome: </labe><input type="text" id="nome" name="nome" value="">
					<br>
					<label for="email">Email: </labe><input type="text" id="email" name="email" value="" style="margin-left: 3px;">
					<br>
					<label for="senha">Senha: </labe><input type="text" id="nome" name="nome" value="" style="margin-left: -3px;">
					<br>
					<br>
					<input type="submit" value="Salvar edição" style="width: 100px; height: 30px;">
					<input type="submit" value="Criar" style="margin-left: 3px; width: 100px; height: 30px;">
				</center>
			</form>
		</div>
		<br>
		<button onclick="sair()">Sair</button>
	</body>
</html>
<?php
// Verifica se os campos do formulário estão definidos
if (isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Atualiza os dados do usuário
    $sql = "UPDATE usuario SET nome='$nome', email='$email' WHERE senha='$senha'";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar o usuário: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}

if(isset($_GET['logout'])){
	session_destroy();
	header('Location:index.php');
}
?>
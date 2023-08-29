<?php
$jogadoresGeral = array();
$jogadoresSemanal = array();

function conexao()
{
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $bcd = 'pife';

    $conn = mysqli_connect($host, $user, $password, $bcd);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Consulta SQL para obter os jogadores da tabela partida (geral)
    $sqlGeral = "SELECT numero FROM ranking WHERE tipo = 'geral'";
    $resultGeral = $conn->query($sqlGeral);

    // Verificar se há resultados e armazenar os jogadores no array $jogadoresGeral
    if ($resultGeral->num_rows > 0) {
        while ($row = $resultGeral->fetch_assoc()) {
            $nomes = explode(';', $row["numero"]);
            foreach ($nomes as $nome){
                adicionarJogadorGeral($nome);
            }
        }
    }

    // Consulta SQL para obter os jogadores da tabela partida (semanal)
    $sqlSemanal = "SELECT numero FROM cumulativo";
    $resultSemanal = $conn->query($sqlSemanal);

    // Verificar se há resultados e armazenar os jogadores no array $jogadoresSemanal
    if ($resultSemanal->num_rows > 0) {
        while ($row = $resultSemanal->fetch_assoc()) {
            $nomes = explode(';', $row["numero"]);
            foreach ($nomes as $nome) {
                adicionarJogadorSemanal($nome);
            }
        }
    }

    // Fechar a conexão com o banco de dados
    $conn->close();

    function adicionarJogadorGeral($jogador)
    {
        global $jogadoresGeral;
        $jogadoresGeral[] = $jogador;
    }

    function adicionarJogadorSemanal($jogador)
    {
        global $jogadoresSemanal;
        $jogadoresSemanal[] = $jogador;
    }

    function listarJogadores($jogadores)
    {
        if (count($jogadores) > 0) {
            for ($i = 0; $i < min(5, count($jogadores)); $i++) {
                echo '<li>';
                echo '<a href="#" class="links-navlateral players" draggable="false">';
                echo '<i class="material-icons">looks_' . ($i + 1) . '</i>';
                $mostrar = explode(';', $jogadores[$i]);
                echo '<span class="nav-item2">' . $mostrar[0] . '</span>';
                echo '</a>';
                echo '</li>';
            }
        } else {
            echo 'Nenhum jogador no Ranking.';
        }
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
			<i class="fas fa-trophy" style="display: inline-block; font-size: 28px;"></i>
			<span class="rank">RANKING</span>
		</center>
		<button id="btn-geral" class="btnrank red" style="margin-right: 6px; background-color: red;">Geral</button>
		<button id="btn-semana" class="btnrank">Semana</button>
		<nav id="nav1" class="nav-lateral">
			<ul id="itens-navlateral">
				<li>
					<a href="#" class="links-navlateral players" draggable="false">
						<i class="material-icons">looks_one</i>
						<?php if (isset($jogadores[1])): ?>
								<?php $mostrar = explode(';', $jogadores[1]); ?>
								<span class="nav-item2"><?php echo $mostrar[0]; ?></span>
							<?php else: ?>
								<span class="nav-item2">Nenhum jogador</span>
							<?php endif; ?>
					</a>
				</li>
				<li>
					<a href="#" class="links-navlateral players" draggable="false">
						<i class="material-icons">looks_two</i>
						<?php if (isset($jogadores[2])): ?>
								<?php $mostrar = explode(';', $jogadores[2]); ?>
								<span class="nav-item2"><?php echo $mostrar[0]; ?></span>
							<?php else: ?>
								<span class="nav-item2">Nenhum jogador</span>
							<?php endif; ?>
					</a>
				</li>
				<li>
					<a href="#" class="links-navlateral players" draggable="false">
						<i class="material-icons">looks_3</i>
						<?php if (isset($jogadores[3])): ?>
								<?php $mostrar = explode(';', $jogadores[3]); ?>
								<span class="nav-item2"><?php echo $mostrar[0]; ?></span>
							<?php else: ?>
								<span class="nav-item2">Nenhum jogador</span>
							<?php endif; ?>
					</a>
				</li>
				<li>
					<a href="#" class="links-navlateral players" draggable="false">
						<i class="material-icons">face</i>
						<?php if (isset($jogadores[4])): ?>
								<?php $mostrar = explode(';', $jogadores[4]); ?>
								<span class="nav-item2"><?php echo $mostrar[0]; ?></span>
							<?php else: ?>
								<span class="nav-item2">Nenhum jogador</span>
							<?php endif; ?>
					</a>
				</li>
				<li>
					<a href="#" class="links-navlateral players" draggable="false">
						<i class="material-icons">face</i>
						<?php if (isset($jogadores[5])): ?>
								<?php $mostrar = explode(';', $jogadores[5]); ?>
								<span class="nav-item2"><?php echo $mostrar[0]; ?></span>
							<?php else: ?>
								<span class="nav-item2">Nenhum jogador</span>
							<?php endif; ?>
					</a>
				</li>
			</ul>
		</nav>
		<nav id="nav2" class="nav-lateral" style="display: none;">
			<ul id="itens-navlateral">
				<li>
					<a href="#" class="links-navlateral players" draggable="false">
						<i class="material-icons">looks_one</i>
						<?php if (isset($jogadores[1])): ?>
								<?php $mostrar = explode(';', $jogadores[1]); ?>
								<span class="nav-item2"><?php echo $mostrar[0]; ?></span>
							<?php else: ?>
								<span class="nav-item2">Nenhum jogador</span>
							<?php endif; ?>
					</a>
				</li>
				<li>
					<a href="#" class="links-navlateral players" draggable="false">
						<i class="material-icons">looks_two</i>
						<?php if (isset($jogadores[2])): ?>
								<?php $mostrar = explode(';', $jogadores[2]); ?>
								<span class="nav-item2"><?php echo $mostrar[0]; ?></span>
							<?php else: ?>
								<span class="nav-item2">Nenhum jogador</span>
							<?php endif; ?>
					</a>
				</li>
				<li>
					<a href="#" class="links-navlateral players" draggable="false">
						<i class="material-icons">looks_3</i>
						<?php if (isset($jogadores[3])): ?>
								<?php $mostrar = explode(';', $jogadores[3]); ?>
								<span class="nav-item2"><?php echo $mostrar[0]; ?></span>
							<?php else: ?>
								<span class="nav-item2">Nenhum jogador</span>
							<?php endif; ?>
					</a>
				</li>
				<li>
					<a href="#" class="links-navlateral players" draggable="false">
						<i class="material-icons">face</i>
						<?php if (isset($jogadores[4])): ?>
								<?php $mostrar = explode(';', $jogadores[4]); ?>
								<span class="nav-item2"><?php echo $mostrar[0]; ?></span>
							<?php else: ?>
								<span class="nav-item2">Nenhum jogador</span>
							<?php endif; ?>
					</a>
				</li>
				<li>
					<a href="#" class="links-navlateral players" draggable="false">
						<i class="material-icons">face</i>
						<?php if (isset($jogadores[5])): ?>
								<?php $mostrar = explode(';', $jogadores[5]); ?>
								<span class="nav-item2"><?php echo $mostrar[0]; ?></span>
							<?php else: ?>
								<span class="nav-item2">Nenhum jogador</span>
							<?php endif; ?>
					</a>
				</li>
			</ul>
		</nav>
		<div class="btnbox">
			<button onclick="fechar()">Fechar</button>
		</div>
	</body>
</html>
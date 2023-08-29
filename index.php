<?php include_once 'funcoes.php'; ?>
<html lang="pt-br">
	<head>
		<title>Pife!</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0.4">
		<link rel="stylesheet" type="text/css" href="resources/css.css">
		<link rel="icon" type="image/png" href="resources/fav1.png">
		<script src="resources/jquery-3.7.0.js"></script>
		<script src="resources/favicon.js"></script>
		<script>
			$(document).ready(function(){
				$('#btntrinca').click(function(){
					$('#pife').fadeOut(function(){
						if ($('#trinca').css("display") === "block"){
							$('#trinca').fadeOut();
						}else{
							$('#trinca').fadeIn();
						}
					});
				});
			});

			$(document).ready(function(){
			  $('#btnpife').click(function(){
					$('#trinca').fadeOut(function(){
						if ($('#pife').css("display") === "block"){
							$('#pife').fadeOut();
						}else{
							$('#pife').fadeIn();
						}
					});
				});
			});
			
			$(document).ready(function(){
				$('#openForm').click(function(){
					if ($('#loginpopup').css("display") === "block"){
						$('#loginpopup').fadeOut();
						$('#openForm').text("Entrar");
						$('#openForm').css("border-color", "white");
					}else{
						$('#loginpopup').fadeIn();
						$('#openForm').text("Cancelar");
						$('#openForm').css("border-color", "red");
						$('#logar').show();
						$('#cadastrar').hide();
					}
				});
			});
			
			$(document).ready(function(){
				$('#btncad').click(function(){
					if ($('#logar').css("display") === "block"){
						$('#logar').hide();
						$('#cadastrar').show();
					}else{
						$('#logar').show();
						$('#cadastrar').hide();
					}
				});
			});
			
			$(document).ready(function(){
				$("#btnsair").click(function(){
					window.location.href = "?logout";
					$('#btnsair').hide();
					$('#openForm').show();
				});
			});
			
			$(document).ready(function(){
				$('#logo').on('contextmenu', function(e){
					e.preventDefault();
					window.location.href = 'jogo.php';
				});
			});
			
			
			function abrirScore(){
				varjanela= window.open('score.php', 'Rank', 'toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,top=200,left=400,width=400,height=500');
			}

		</script>
	</head>
	<body>
		<div class="menu">
			<div class="logo">
				<img src="resources/logo.png" title="Jogar" id="logo" onclick="abrirScore()" draggable="false">
			</div>
			<button class="login" id="openForm">Entrar</button>
			<button class="login" id="btnsair" style="display: none;">Sair</button>
		</div>
		<div class="logored">
			<div class="border"></div>
		</div>
		<div class="home">
			<center style="margin-top: 55px;">
				<h1>COMO JOGAR:</h1>
				<p>Pife, também conhecido como jogo de cartas do buraco, é uma das modalidades mais populares e desafiadoras entre os entusiastas de jogos de cartas. Com uma longa história e origens incertas, o pife oferece uma mistura de estratégia, habilidade e sorte, cativando jogadores de todas as idades ao redor do mundo. Com seu baralho tradicional de 52 cartas, o jogo traz emoção e competição em cada rodada, onde jogadores tentam formar sequências, combinações e descartar suas cartas com astúcia para alcançar a vitória. Seja em partidas descontraídas entre amigos ou em torneios competitivos, o pife é um passatempo envolvente que testa a sagacidade e o poder de observação dos participantes. Prepare-se para mergulhar em um universo repleto de estratégias e reviravoltas, onde cada jogada pode fazer a diferença entre o triunfo e a derrota. Descubra a emoção do pife e embarque nessa jornada repleta de diversão e desafios.</p>
				<h2>Regras do Pife:</h2>
				<p>Distribuição das cartas: No início do jogo, as cartas são embaralhadas e distribuídas para cada jogador. O pife é tradicionalmente jogado com dois baralhos de 52 cartas cada, totalizando 104 cartas. A quantidade de jogadores pode variar, mas normalmente são quatro participantes.</p>
				<p>Objetivo: O objetivo principal do pife é formar sequências (três ou mais cartas em ordem numérica) e combinações (três ou quatro cartas do mesmo valor) para descartar todas as cartas da mão e acumular pontos.</p>
				<h2>Jogadas principais:</h2>
				<p>Sequência: Consiste em formar uma sequência de três ou mais cartas consecutivas do mesmo naipe, como 5, 6 e 7 de copas. As sequências podem ser formadas tanto em ordem crescente como decrescente.</p>
				<img src="resources/trinca.svg" title="Trinca" id="btntrinca" class="ajuda" draggable="false">
				<img src="resources/sequencia.svg" title="Sequência" id="btnpife" class="ajuda" draggable="false">
				<div id="regras">
					<div id="trinca" style="transition: max-height 1s ease-in-out; display: none;">
						<p>Trinca: Envolve a formação de um grupo de três ou quatro cartas do mesmo valor, independentemente do naipe. Por exemplo, três 8's ou quatro 2's.
					</div>
					<div id="pife" style="transition: max-height 1s ease-in-out; display: none;">
						<p>Sequência (Pife): O pife ocorre quando um jogador consegue descartar todas as suas cartas de uma vez, sem precisar fazer descartes adicionais. Nesse caso, o jogador ganha uma pontuação extra.</p>
					</div>
				</div>
				<p>Descarte: Durante o jogo, cada jogador pode descartar uma carta por vez, substituindo-a por uma do topo do monte ou por uma do lixo (a pilha de cartas descartadas pelos jogadores). O descarte deve ser feito sempre após a compra de uma carta.</p>
				<p>Compra de cartas: Ao realizar a compra de uma carta, o jogador pode escolher entre pegar a carta do topo do monte ou do lixo. A estratégia na escolha da carta a ser comprada é fundamental para formar sequências e combinações e descartar as cartas indesejadas.</p>
				<p>Pontuação: Ao final de cada rodada, os jogadores contabilizam os pontos das cartas que não conseguiram descartar. Cada carta numérica vale o seu valor nominal, enquanto as figuras (valete, dama, rei) valem 10 pontos cada. O objetivo é acumular o menor número de pontos possível.</p>
				<p>Continuidade do jogo: O pife é jogado em várias rodadas, e o jogo prossegue até que um jogador alcance a pontuação acordada previamente (geralmente 100 pontos) ou até que um número determinado de rodadas seja jogado. O pife, com dois baralhos de 52 cartas, oferece uma maior variedade de combinações e jogadas estratégicas. Com suas regras simples de aprender, mas desafiadoras de dominar, o pife proporciona uma experiência empolgante e competitiva para jogadores de todas as habilidades. Desafie seus amigos ou participe de torneios e mergulhe na atmosfera emocionante do jogo de cartas do buraco.</p>
				<button class="btnjogo" onclick="location.href='<?php echo $end; ?>'" style="margin-bottom: 20px; height: 60px; border: 2px solid white;">ENCONTRE UMA PARTIDA</button>
				<button class="btnjogo" onclick="location.href='jogo.php?criar'" style="margin-bottom: 20px; height: 60px; border: 2px solid white;">CRIE UMA SALA</button>
			</center>
		</div>

		<!-- POPUP DE LOGIN -->

		<div class="form-popup" id="loginpopup">
			<div class="form-popup" id="logar">
				<form action="#" method="POST" class="form-container">
					<center>
						<h1>Login</h1>
					</center>
					<label for="nome"><b>Nome:</b></label>
					<input type="text" placeholder="Nome de usuário" id="nome" name="nome" required>
					<label for="senha"><b>Senha:</b></label>
					<input type="password" placeholder="Senha" id="senha" name="senha" required>
					<button type="submit" class="btnent" name="login" style="margin-bottom: 10px;">Entrar</button>
					<button type="button" id="btncad" class="btnent cad" style="margin-bottom: -10px;">Cadastrar</button>
				</form>
			</div>

		<!-- PARTE DE CADASTRO -->

			<div class="form-popup" id="cadastrar" style="display: none;">
				<form action="#" method="POST" class="form-container">
					<center>
						<h1>Cadastrar</h1>
					</center>
					<label for="cadnome"><b>Nome:</b></label>
					<input type="text" placeholder="Nome de usuário" id="cadnome" name="cadnome" required>
					<label for="cademail"><b>Email:</b></label>
					<input type="text" placeholder="Email" id="cademail" name="cademail" required>
					<label for="cadsenha"><b>Senha:</b></label>
					<input type="password" placeholder="Senha" id="cadsenha" name="cadsenha" required>
					<button type="submit" name="cadastrar" class="btnent" style="margin-bottom: 10px;">Cadastrar</button>
				</form>
			</div>
		</div>
	</body>
	<?php 
		if(isset($_POST['login'])){
			$nome = $_POST['nome'];
			$senha = $_POST['senha'];

			logar($nome, $senha);
		}
		if(isset($_POST['cadastrar'])){
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$senha = $_POST['senha'];

			cadastrar($nome, $email, $senha);
		}
	?>
</html>
<html lang="pt-br">

	<head>
		<title>Pife!</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0.4">
		<link rel="icon" type="image/png" href="resources/fav1.png">
		<link rel="stylesheet" href="resources/css.css" type="text/css">
		<link rel="stylesheet" href="resources/style.css" type="text/css">
		<link rel="stylesheet" href="resources/icones.css" type="text/css">
		<script src="resources/jquery-3.7.0.js"></script>
		<script src="resources/jquery-ui.min.js"></script>
		<script src="resources/favicon.js"></script>
		<script>
			function sair(){
				if(confirm("Tem certeza que deseja sair do jogo?")){
					window.location.href = 'index.php';
				}
			}

			function home(){
				if(confirm("Tem certeza que deseja retornar à página inicial?")){
					window.location.href = 'index.php';
				}
			}
			
			window.addEventListener("message", (event) => {valor.value = event.data;}, false);
			
			function abrirScore(){
				varjanela= window.open('score.php', 'Rank', 'toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,top=200,left=400,width=400,height=500');
			}

			function abrirPerfil(){
				varjanela= window.open('perfil.php', 'Rank', 'toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,top=200,left=400,width=400,height=460');
			}

			function reportarerro(){
				varjanela= window.open('erro.php', 'Rank', 'toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,top=200,left=400,width=400,height=600');
			}
			
			function startTimer() {
				var timerElement = document.getElementById("timer");
				var minutes = 2;
				var seconds = 0;
				var interval = setInterval(function() {
					if (minutes >= 0 && seconds >= 0) {
						timerElement.textContent = padZero(minutes) + ":" + padZero(seconds);
						seconds--;

						if (seconds < 0) {
							minutes--;
							seconds = 59;
						}
					} else {
						timerElement.textContent = "Tempo encerrado!";
						clearInterval(interval);
					}
				}, 1000); // Delay de 1 segundo (1000ms)

				function padZero(num) {
					return num.toString().padStart(2, '0');
				}
			}

			var interval;
			var minutes = 2;
			var seconds = 0;

			function startTimer() {
				clearInterval(interval); // Limpa qualquer timer anterior
				interval = setInterval(updateTimer, 1000);
			}

			function stopTimer() {
				clearInterval(interval);
				resetTimer();
			}

			function updateTimer() {
				var timerElement = $("#timer");

				if (minutes >= 0 && seconds >= 0) {
					timerElement.text(padZero(minutes) + ":" + padZero(seconds));
					seconds--;

					if (seconds < 0) {
						minutes--;
						seconds = 59;
					}
				} else {
					timerElement.text("Tempo encerrado!");
					resetTimer();
					clearInterval(interval);
				}
			}

			function resetTimer() {
				minutes = 2;
				seconds = 0;
				$("#timer").text("02:00");
			}

			function padZero(num) {
				return num.toString().padStart(2, '0');
			}
		</script>
	</head>
	<body id="areaJogo">
		<!-- Não mexer -->
		<?php
			/*
			if(isset($_SESSION['log'])){
				if(isset($_GET['host'])){
					echo '<script>';
					echo '$(document).ready(function(){';
					echo '$("#host").show();';
					echo '$("#playerscreen").hide();';
					echo '});';
					echo '</script>';
				}else{
					echo '<script>';
					echo '$(document).ready(function(){';
					echo '$("#host").hide();';
					echo '$("#playerscreen").show();';
					echo '});';
					echo '</script>';
				}

		// Verifica se é um dispositivo móvel
		function isMobileDevice()
		{
			return preg_match('/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i', $_SERVER['HTTP_USER_AGENT']);
		}

		if (isMobileDevice()){
			echo '<div id="rotateMessage" class="aviso" style="margin: 0;"><div style="margin-top: 42vh;"><center><i class="material-icons" style="font-size: 72px;">stay_primary_portrait</i><i class="material-icons" style="font-size: 72px;">trending_flat</i><i class="material-icons" style="font-size: 72px;">stay_primary_landscape</i><br><br><h1>Gire sua tela para continuar!</h1></center></div></div>';
			echo '<script>';
			echo 'function checkOrientation(){';
			echo 'var rotateMessage = document.getElementById("rotateMessage");';
			echo 'if (window.innerHeight > window.innerWidth){';
			echo 'rotateMessage.style.display = "block";';
			echo '} else{';
			echo 'rotateMessage.style.display = "none";';
			echo '}';
			echo '}';
			echo 'window.addEventListener("DOMContentLoaded", checkOrientation);';
			echo 'window.addEventListener("resize", checkOrientation);';
			echo '</script>';
		}
		*/
		?>
		<!-- ######### -->
		<div class="logo" style="border-bottom: 118px solid #181920; border-left: 99px solid transparent; border-right: 99px solid transparent;">
			<div style="width: 200px; position: absolute; top: 0px; z-index: 15; transform: rotate(180deg);">
				<center>
					<h1>Tempo:</h1>
					<h1 id="timer" style="font-family: arialrounded;">02:00</h1>
				</center>
			</div>
		</div>
		<div class="logored" style="position: absolute;">
			<div class="border" style="border-bottom: 120px solid red;"></div>
		</div>
		<div id="vezde" style="width: 240px; height: 100px; position: absolute; top: 35px; right: 40px; z-index: 15; background-color: #2F785299; border: 3px solid #2F7852; border-radius: 8px;">
			<center>
				<h1 style="margin-top: -15px; margin-bottom: 15px;">Vez de:</h1>
				<p style="font-family: arialrounded; color: black; font-size: 28px; text-align: center; margin: 0px;">$Jogador</p>
			</center>
		</div>
		<nav id="nav-lateral" style="z-index: 50;">
			<ul id="itens-navlateral">
				<li>
					<a href="#" id="logo-navlateral" class="links-navlateral" draggable="false">
						<img src="resources/logo.png" id="logo-nav" alt="logo" draggable="false">
						<span class="nav-item" style="margin-left: 20%; margin-top: 10px; font-size: 20;">Pife!</span>
					</a>
				</li>
				<li>
					<a href="#" onclick="home()" class="links-navlateral" draggable="false">
						<i class="fas fa-home"></i>
						<span class="nav-item">Home</span>
					</a>
				</li>
				<li>
					<a href="#" onclick="abrirPerfil()" class="links-navlateral" draggable="false">
						<i class="fas fa-user"></i>
						<span class="nav-item">Perfil</span>
					</a>
				</li>
				<li>
					<a href="#" onclick="abrirScore()" class="links-navlateral" draggable="false">
						<i class="fas fa-trophy"></i>
						<span class="nav-item">Ranking</span>
					</a>
				</li>
				<li>
					<a href="#" onclick="reportarerro()" class="links-navlateral" draggable="false">
						<i class="fas fa-exclamation-circle"></i>
						<span class="nav-item">Reportar erro</span>
					</a>
				</li>
				<li>
				<li>
					<a href="#" class="links-navlateral players" draggable="false">
						<i class="material-icons">looks_one</i>
							<span class="nav-item2"></span>
							<span class="nav-item2">Nenhum jogador</span>
					</a>
				</li>
				<li>
					<a href="#" class="links-navlateral players" draggable="false">
						<i class="material-icons">looks_two</i>
							<span class="nav-item2"></span>
							<span class="nav-item2">Nenhum jogador</span>
					</a>
				</li>
				<li>
					<a href="#" class="links-navlateral players" draggable="false">
						<i class="material-icons">looks_3</i>
						<span class="nav-item2">Nenhum jogador</span>
					</a>
				</li>
				<li>
					<a href="#" class="links-navlateral players" draggable="false">
						<i class="material-icons">looks_4</i>
							<span class="nav-item2"></span>
							<span class="nav-item2">Nenhum jogador</span>
					</a>
				</li>
				<li>
					<a href="index.php?logout" id="logout" onclick="sair()" class="links-navlateral" draggable="false">
						<i class="fas fa-sign-out-alt"></i>
						<span class="nav-item" style="margin-left: 20%;">Sair</span>
					</a>
				</li>
			</ul>
		</nav>

		<!--Pilha-->

		<div id="host" class="pilha" style="display: none;">
			<div style="float: left;">
				<img src="resources/verso.svg" id="compra" draggable="false">
				<p style="font-family: arialrounded; color: #2F7852; font-size: 28px; text-align: center; margin: 0px; margin-left: 50%;">COMPRA</P>
			</div>
			<div style="float: left; z-index: 5;">
				<img src="resources/verso.svg" id="compra2" style="position: relative; display: none; height: 260px; width: auto; margin-top: 40%; margin-left: -60%;" draggable="false">
			</div>
			<div style="float: right;">
				<img src="resources/transparente.png" id="descarte1" style="height: 260px; width: auto; margin-top: 40%; margin-left: -40%;" draggable="false">
				<p style="font-family: arialrounded; color: #2F7852; font-size: 28px; text-align: center; margin: 0px; margin-left: -80%;">DESCARTE</P>
			</div>
			<div style="float: right; z-index: 5;">
				<img src="resources/transparente.png" id="descarte2" draggable="false">
			</div>
			<div style="float: right; z-index: 6;">
				<img src="resources/ouros/3.svg" id="descarte3" draggable="false">
			</div>
		</div>
		<div id="playerscreen" style="overflow: hidden; width: calc(100vw - 90px); height: 100%; position: fixed; top: 0; left: 90px; padding-top: 15%;">
			<div id="cartacomprada" style="width: 240px; height: 100px; position: absolute; top: 35px; left: 40px; z-index: 15; background-color: #2F785299; border: 3px solid #2F7852; border-radius: 8px;">
				<center>
					<h1 style="margin-top: -15px; margin-bottom: 15px;">Carta comprada:</h1>
					<p style="font-family: arialrounded; color: black; font-size: 28px; text-align: center; margin: 0px;"></p>
				</center>
			</div>
			<center>
				<div class="grid center" id="grid">
					<div class="grid__item" id="C1"><div class="grid__null center"><a href="resources/copas/2.svg" draggable="false"><img src="resources/copas/2.svg"id="C1" style="height: auto; width: 20vh;" draggable="false"></a></div></div>
					<div class="grid__item" id="C2"><div class="grid__null center"><a href="resources/copas/2.svg" draggable="false"><img src="resources/copas/2.svg" id="C2" style="height: auto; width: 20vh;" draggable="false"></a></div></div>
					<div class="grid__item" id="C3"><div class="grid__null center"><a href="resources/copas/2.svg" draggable="false"><img src="resources/copas/2.svg" id="C3" style="height: auto; width: 20vh;" draggable="false"></a></div></div>
					<div class="grid__item" id="C4"><div class="grid__null center"><a href="resources/copas/2.svg" draggable="false"><img src="resources/copas/2.svg" id="C4" style="height: auto; width: 20vh;" draggable="false"></a></div></div>
					<div class="grid__item" id="C5"><div class="grid__null center"><a href="resources/copas/2.svg" draggable="false"><img src="resources/copas/2.svg" id="C5" style="height: auto; width: 20vh;" draggable="false"></a></div></div>
					<div class="grid__item" id="C6"><div class="grid__null center"><a href="resources/copas/2.svg" draggable="false"><img src="resources/copas/2.svg" id="C6" style="height: auto; width: 20vh;" draggable="false"></a></div></div>
					<div class="grid__item" id="C7"><div class="grid__null center"><a href="resources/copas/2.svg" draggable="false"><img src="resources/copas/2.svg" id="C7" style="height: auto; width: 20vh;" draggable="false"></a></div></div>
					<div class="grid__item" id="C8"><div class="grid__null center"><a href="resources/copas/2.svg" draggable="false"><img src="resources/copas/2.svg" id="C8" style="height: auto; width: 20vh;" draggable="false"></a></div></div>
					<div class="grid__item" id="C9"><div class="grid__null center"><a href="resources/copas/2.svg" draggable="false"><img src="resources/copas/2.svg" id="C9" style="height: auto; width: 20vh;" draggable="false"></a></div></div>
				</div>
				<br>
				<a href="?deck"><button class="btnjogo" onclick="startTimer()">COMPRAR</button></a>
				<a href="?desc"><button class="btnjogo" onclick="stopTimer()">PEGAR DO DESCARTE</button>
				<a href="?descer"><button class="btnjogo" onclick="stopTimer()">BATER</button></a>
			</center>
		</div>
		<script>
			 // Função para inicializar o recurso de arrastar e soltar
			function initializeDraggable() {
				const items = document.getElementsByClassName('grid__item');
				
				// Adiciona os manipuladores de eventos para cada item
				for (let i = 0; i < items.length; i++) {
					const item = items[i];
					item.draggable = true;
					item.addEventListener('dragstart', dragStart);
					item.addEventListener('dragenter', dragEnter);
					item.addEventListener('dragover', dragOver);
					item.addEventListener('dragleave', dragLeave);
					item.addEventListener('drop', drop);
					item.addEventListener('dragend', dragEnd);
				}
			}
			
			// Armazena o item arrastado
			let draggedItem = null;
			
			// Manipulador de evento 'dragstart'
			function dragStart(e) {
				draggedItem = this;
				setTimeout(() => {
					this.style.display = 'none';
				}, 0);
			}
			
			// Manipulador de evento 'dragenter'
			function dragEnter(e) {
				e.preventDefault();
			}
			
			// Manipulador de evento 'dragover'
			function dragOver(e) {
				e.preventDefault();
			}
			
			// Manipulador de evento 'dragleave'
			function dragLeave() {
				// Remover qualquer estilo de destaque quando o item é arrastado para fora
				this.classList.remove('drag-over');
			}
			
			// Manipulador de evento 'drop'
			function drop() {
				// Inverte a posição dos itens arrastados e soltos
				if (draggedItem !== this) {
					const grid = document.getElementById('grid');
					const children = Array.from(grid.children);
					const draggedIndex = children.indexOf(draggedItem);
					const droppedIndex = children.indexOf(this);
			
					if (draggedIndex > droppedIndex) {
						grid.insertBefore(draggedItem, this);
					} else {
						grid.insertBefore(draggedItem, this.nextSibling);
					}
				}
			
				// Remove qualquer estilo de destaque quando o item é solto
				this.classList.remove('drag-over');
			}
			
			// Manipulador de evento 'dragend'
			function dragEnd() {
				this.style.display = 'block';
				draggedItem = null;
			}
			
			// Inicializa o recurso de arrastar e soltar quando o documento é carregado
			document.addEventListener('DOMContentLoaded', initializeDraggable);
		</script>
		<?php
			if(isset($_POST['comprar'])){
				echo '<script>';
				echo '$("#compra").on("click", function(){';
				echo '$("#compra2").show();';
				echo '$("#compra2").addClass("animada");';
				echo '$("#compra").delay(2000).queue(function(next){';
				echo '$("#compra2").hide();';
				echo '$("#compra2").removeClass("animada");';
				echo 'next();';
				echo '});';
				echo '});';
				echo '</script>';
			}
		?>
		<script>
			$("#compra").on("click", function(){
				$('#C1').trigger("src", "resources/ouros/A.svg");
				$('#C2').trigger("src", "resources/ouros/2.svg");
				$('#C3').trigger("src", "resources/ouros/3.svg");
				$('#C4').trigger("src", "resources/ouros/4.svg");
				$('#C5').trigger("src", "resources/ouros/5.svg");
				$('#C6').trigger("src", "resources/ouros/6.svg");
				$('#C7').trigger("src", "resources/ouros/7.svg");
				$('#C8').trigger("src", "resources/ouros/8.svg");
				$('#C9').trigger("src", "resources/ouros/9.svg");
			});

			$("#compra").on("click", function(){
				$('#compra2').show();
				$("#compra2").addClass("animada");
				$("#compra").delay(2000).queue(function(next){
					$('#compra2').hide();
					$("#compra2").removeClass("animada");
					next();
				});
			});
			
			$("#descarte2").on("click", function(){
				$("#descarte2").addClass("animada");
				$("#descarte2").delay(2000).queue(function(next){
					$('#descarte2').prop("src", "resources/transparente.png");
					$("#descarte2").removeClass("animada");
					next();
				});
			});
			
			$("#descarte1").on("click", function(){
				$("#descarte3").addClass("animada");
				$("#descarte3").delay(2000).queue(function(next){
					next();
				});
			});
			
			$(document).ready(function() {
				$("#btnSair").click(function() {
					window.location.href = "?logout";
				});
			});

			function comprarCarta(){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if (this.readyState == 4 && this.status == 200){
						document.getElementById("carta").innerHTML = this.responseText;
					}
				};
				xhttp.open("GET", "comprar_carta.php", true);
				xhttp.send();
			}

			function adicionarCarta(carta){
				var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "adicionar_carta.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("carta=" + carta);
			}

			//Final
		</script>
		<?php 
			/*
			}else{
				echo '<div style="display: block; position: absolute; top: 0; left: 0; z-index: 100; width: 100%; height: 100%;"><div style="margin-top: 20%;"><center><h1>Logue-se para continuar!</h1><br><button class="btnjogo" id="voltar">Retornar à tela inicial</button></center></div></div>';
				echo '<script>';
				echo '$("#voltar").click(function(){window.location.href = "index.php";});';
				echo '</script>';
			}
			*/
		?>
	</body>
</html>

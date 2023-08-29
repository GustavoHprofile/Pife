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

            function salvar(){
                var nome = document.getElementByid('nome');
                var email = document.getElementByid('email');
                var senha = document.getElementByid('senha');

                var xhr = new XMLHttpRequest();
                xhr.open('GET', "teste.php?parametro1=enviar&nome="+nome+"&email="+email+"&senha="+senha, true);

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
		</script>
	</head>
	<body>
		<center style="margin-bottom: 20px;">
			<i class="fas fa-user" style="display: inline-block; font-size: 28px;"></i>
			<span class="rank" style="margin-left: -15px;">PERFIL</span>	
		</center>
		<center>
			<p>Alterar dados do perfil</p>
		</center>
		<form action="#" method='POST'>
			<label for="nome">Nome de usuário:</label>
			<input type="text" id="nome" name="nome" title="Nome de usuário" class="button" style="height: 30px; font-size: 16px; margin-top: 10px;">
			<label for="email">E-mail:</label>
			<input type="text" id="email" name="email" title="E-mail"  class="button" style="height: 30px; font-size: 16px; margin-top: 10px;">
			<label for="senha">Senha:</label>
			<input type="text" id="senha" name="senha" title="Senha" class="button"  style="height: 30px; font-size: 16px; margin-top: 10px;">
		<div class="btnbox">
			<button id="salvar"  name='enviar' type='submit' style="background-color: #555353;">Salvar</button>
			<button onclick="fechar()">Fechar</button>
		</div>
    </form>
	</body>
</html>
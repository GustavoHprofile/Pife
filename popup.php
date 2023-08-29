<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Executar Código</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
            function abrirAdmin(){
                var janela = window.open('admin.php', 'Score', 'toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,top=200,left=400,width=400,height=600');
            }

            function abrirErro(){
                var janela = window.open('erro.php', 'Admin', 'toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,top=200,left=400,width=400,height=600');
            }

            function abrirPerfil(){
                var janela = window.open('perfil.php', 'Admin', 'toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,top=200,left=400,width=400,height=460');
            }
			
            function abrirScore(){
                var janela = window.open('score.php', 'Score', 'toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,top=200,left=400,width=400,height=500');
            }
    </script>
</head>
<body>
    <h1>Executar Código</h1>
    <button onclick="abrirAdmin()">Abrir Admin</button>
    <button onclick="abrirErro()">Abrir Erro</button>
    <button onclick="abrirPerfil()">Abrir Perfil</button>
    <button onclick="abrirScore()">Abrir Score</button>
</body>
</html>
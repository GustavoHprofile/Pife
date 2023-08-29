<!DOCTYPE html>
<html>
<head>
    <title>Página de Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .sidebar {
            width: 200px;
            background-color: #f1f1f1;
            padding: 20px;
        }

        .content {
            flex: 1;
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
        }

        .login-form {
            display: inline-block;
            text-align: left;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .register-link {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img class="logo" src="logo.png" alt="Logo do Site">
        </div>
        <div class="content">
            <h2>Login</h2>
            <form class="login-form" method="POST" action="pagina_login.php">
                <input type="text" name="username" placeholder="Nome de usuário" required><br>
                <input type="password" name="password" placeholder="Senha" required><br>
                <input type="submit" name="login" value="Login">
            </form>
            <p>Não tem cadastro? <a class="register-link" href="pagina_cadastro.php" target="_blank">Clique aqui</a></p>
        </div>
    </div>
</body>
</html>
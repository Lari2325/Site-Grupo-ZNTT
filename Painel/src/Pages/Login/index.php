<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div id="usuario-incorreto"></div>

    <main class="login-container">
        <div class="login">
            <h1>Login</h1>
            <form action="./processa_formulario.php" method="POST">
                <label for="user">Usuário:</label>
                <input type="user" id="user" name="user">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password">
                <button type="submit">Entrar</button>
            </form>
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const params = new URLSearchParams(window.location.search);
            const usuario = params.get('usuario');

            if (usuario === 'incorreto') {
                let usuarioIncorretoElement = document.getElementById("usuario-incorreto");
                usuarioIncorretoElement.innerHTML = "Usuário ou senha incorretos.";
                usuarioIncorretoElement.classList.add("usuario-incorreto");

                setTimeout(function() {
                    window.location.href = "index.php";
                }, 10000); // 10 segundos
            }
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 95%;
        }
        button {
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 3px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <main class="login-container">
        <h1>Login</h1>
        <form action="./processa_formulario.php" method="POST">
            <div>
                <label for="user">Usuário:</label>
                <input type="user" id="user" name="user">
            </div>
            <div>
                <label for="password">Senha</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit">Entrar</button>
        </form>
    </main>
</body>
</html>

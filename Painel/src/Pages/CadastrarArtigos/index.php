<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../Login/index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Artigos</title>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .main-container {
            width: 795px;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, textarea {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100%;
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
    <?php 
        include("../menu.php");
    ?>
    
    <main class="main-container">
        <h1>Cadastro de Artigo</h1>
        <form id="artigoForm" action="processa_artigo.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo">
            </div>
            <div>
                <label for="texto_chamada">Texto de Chamada:</label>
                <textarea id="texto_chamada" name="texto_chamada"></textarea>
            </div>
            <div>
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao"></textarea>
            </div>
            <div>
                <label for="imagem">Imagem:</label>
                <input type="file" id="imagem" name="imagem">
            </div>
            <button type="submit">Cadastrar Artigo</button>
        </form>
    </main>

    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.2/"
            }
        }
    </script>
    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font
        } from 'ckeditor5';

        ClassicEditor
            .create(document.querySelector('#descricao'), {
                plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            })
            .then(editor => {
                window.editor = editor;

                const form = document.querySelector('#artigoForm');
                form.addEventListener('submit', () => {
                    document.querySelector('#descricao').value = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>
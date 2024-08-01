<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Marcas</title>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css">
    <style>
        .main-container {
            width: 795px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <?php
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: ../Login/index.php');
            exit();
        }
        
        include_once('../menu.php');
    ?>

    <main class="main-container">
        <h1>Cadastrar Marcas</h1>
        <form action="cadastrar_marca.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div>
                <label for="logo">Logo (imagem):</label>
                <input type="file" id="logo" name="logo" accept="image/*" required>
            </div>
            <div>
                <label for="link_insta">Link Instagram:</label>
                <input type="text" id="link_insta" name="link_insta">
            </div>
            <div>
                <label for="link_face">Link Facebook:</label>
                <input type="text" id="link_face" name="link_face">
            </div>
            <div>
                <label for="link_landing_page">Link da Página de Aterrissagem:</label>
                <input type="text" id="link_landing_page" name="link_landing_page">
            </div>
            <div>
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao"></textarea>
            </div>
            <button type="submit">Cadastrar</button>
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
        import { ClassicEditor, Essentials, Paragraph, Bold, Italic, Font } from 'ckeditor5';

        ClassicEditor
            .create(document.querySelector('#descricao'), {
                plugins: [Essentials, Paragraph, Bold, Italic, Font],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        window.onload = function() {
            if (window.location.protocol === "file:") {
                alert("This sample requires an HTTP server. Please serve this file with a web server.");
            }
        };
    </script>
</body>
</html>
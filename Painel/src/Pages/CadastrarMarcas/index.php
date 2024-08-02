<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Marcas</title>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

    <div class="container-full" id="container-full">
        <?php
            session_start();
    
            if (!isset($_SESSION['user'])) {
                header('Location: ../Login/index.php');
                exit();
            }
            
            include_once('../menu.php');
        ?>
    
        <main class="main-container" id="conteudo">
            <h1>Cadastrar Marcas</h1>
            <form action="cadastrar_marca.php" method="POST" enctype="multipart/form-data">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                <label for="logo">Logo (imagem):</label>
                <input type="file" id="logo" name="logo" accept="image/*" required>
                <label for="link_insta">Link Instagram:</label>
                <input type="text" id="link_insta" name="link_insta">
                <label for="link_face">Link Facebook:</label>
                <input type="text" id="link_face" name="link_face">
                <label for="link_landing_page">Link da Página de Aterrissagem:</label>
                <input type="text" id="link_landing_page" name="link_landing_page">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao"></textarea>
                <button type="submit">Cadastrar</button>
            </form>
        </main>
    </div>

    <script src="../../assets/js/menu.js"></script>

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
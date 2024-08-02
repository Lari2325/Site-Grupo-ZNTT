<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../Login/index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Artigos</title>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/theme-lark.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container-full" id="container-full">
        <?php 
            include("../menu.php");
        ?>
        
        <main class="main-container" id="conteudo">
            <h1>Cadastro de Artigo</h1>
            <form id="artigoForm" action="processa_artigo.php" method="POST" enctype="multipart/form-data">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo">
                <label for="texto_chamada">Texto de Chamada:</label>
                <textarea id="texto_chamada" name="texto_chamada"></textarea>
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao"></textarea>
                <label for="imagem">Imagem:</label>
                <input type="file" id="imagem" name="imagem">
                <button type="submit">Cadastrar Artigo</button>
            </form>
        </main>
    </div>

    <script src="../../assets/js/menu.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#descricao'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|',
                        'link', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'alignment', '|',
                        'outdent', 'indent', '|',
                        'blockQuote', '|',
                        'insertTable', 'tableColumn', 'tableRow', 'mergeTableCells', '|',
                        'imageUpload', 'mediaEmbed', 'removeFormat', '|',
                        'undo', 'redo'
                    ]
                },
                language: 'pt',
                image: {
                    toolbar: [
                        'imageTextAlternative', 'imageStyle:full', 'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn', 'tableRow', 'mergeTableCells'
                    ]
                },
                licenseKey: '',
                
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

<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../Login/index.php');
    exit();
}

require_once("../../../databaseconnect.php");

date_default_timezone_set('America/Sao_Paulo');

if (!isset($_GET['id_artigo']) || empty($_GET['id_artigo'])) {
    echo "ID do artigo não fornecido.";
    exit;
}

$id_artigo = $_GET['id_artigo'];

try {
    $query = "SELECT * FROM tb_artigos WHERE id_artigo = :id_artigo";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_artigo', $id_artigo);
    $stmt->execute();
    $artigo = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$artigo) {
        echo "Artigo não encontrado.";
        exit;
    }
} catch (PDOException $e) {
    echo "Erro ao buscar artigo: " . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $texto_chamada = $_POST['texto_chamada'];
    $descricao = $_POST['descricao'];
    $data_hora_postagem = date('Y-m-d H:i:s'); 

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagem_nome_original = basename($_FILES['imagem']['name']);
        $imagem_temp = $_FILES['imagem']['tmp_name'];
        $imagem_ext = strtolower(pathinfo($imagem_nome_original, PATHINFO_EXTENSION));

        $imagem_nome = uniqid() . '.' . $imagem_ext;
        $imagem_dir = '../../Imagens/';
        $imagem_path = $imagem_dir . $imagem_nome;

        if (move_uploaded_file($imagem_temp, $imagem_path)) {
            $imagem_update = ", imagem = :imagem";
            $imagem_param = $imagem_nome;
        } else {
            echo "Erro ao mover o arquivo de imagem.";
            exit;
        }
    } else {
        $imagem_update = "";
        $imagem_param = null;
    }

    try {
        $query = "UPDATE tb_artigos SET titulo = :titulo, texto_chamada = :texto_chamada, descricao = :descricao, data_hora_postagem = :data_hora_postagem $imagem_update WHERE id_artigo = :id_artigo";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':texto_chamada', $texto_chamada);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':data_hora_postagem', $data_hora_postagem);
        $stmt->bindParam(':id_artigo', $id_artigo);

        if ($imagem_param) {
            $stmt->bindParam(':imagem', $imagem_param);
        }

        if ($stmt->execute()) {
            echo "Artigo atualizado com sucesso!";
            header('Location: ./index.php');
            exit;
        } else {
            echo "Erro ao atualizar o artigo.";
        }
    } catch (PDOException $e) {
        echo "Erro na consulta: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Artigo</title>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/theme-lark.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container-full" id="container-full">
        <?php include("../menu.php"); ?>
    
        <main id="conteudo">
            <h1>Editar Artigo</h1>
            <form action="editar_artigo.php?id_artigo=<?php echo htmlspecialchars($id_artigo); ?>" method="POST" enctype="multipart/form-data">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($artigo['titulo']); ?>" required>
                <label for="texto_chamada">Texto de Chamada:</label>
                <textarea id="texto_chamada" name="texto_chamada" required><?php echo htmlspecialchars($artigo['texto_chamada']); ?></textarea>
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" required><?php echo htmlspecialchars($artigo['descricao']); ?></textarea>
                <label for="imagem">Imagem (deixe em branco para manter a atual):</label>
                <input type="file" id="imagem" name="imagem">
                <p style="margin-bottom: 30px;">Imagem Atual: <?php echo htmlspecialchars($artigo['imagem']); ?></p>                
                <button type="submit">Atualizar Artigo</button>
            </form>
        </main>
    </div>

    <script src="../../assets/js/menu.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
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
                }
            })
            .then(editor => {
                window.editor = editor;
                const form = document.querySelector('form');
                form.addEventListener('submit', () => {
                    document.querySelector('#descricao').value = editor.getData();
                });
            })
            .catch(error => {
                console.error('Erro ao inicializar o CKEditor:', error);
            });
    </script>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../Login/index.php');
    exit();
}

require_once("../../../databaseconnect.php");

date_default_timezone_set('America/Sao_Paulo');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID da marca não fornecido.";
    exit;
}

$id = $_GET['id'];

try {
    $query = "SELECT * FROM tb_franquias WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $marca = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$marca) {
        echo "Marca não encontrada.";
        exit;
    }
} catch (PDOException $e) {
    echo "Erro ao buscar marca: " . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $link_insta = $_POST['link_insta'];
    $link_face = $_POST['link_face'];
    $link_landing_page = $_POST['link_landing_page'];
    $descricao = $_POST['descricao'];

    // Processar o upload do arquivo
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $logo_nome_original = basename($_FILES['logo']['name']);
        $logo_temp = $_FILES['logo']['tmp_name'];
        $logo_ext = strtolower(pathinfo($logo_nome_original, PATHINFO_EXTENSION));

        $logo_nome = uniqid() . '.' . $logo_ext;
        $logo_dir = '../../Imagens/';
        $logo_path = $logo_dir . $logo_nome;

        if (move_uploaded_file($logo_temp, $logo_path)) {
            $logo_update = ", logo = :logo";
            $logo_param = $logo_nome;
        } else {
            echo "Erro ao mover o arquivo de logo.";
            exit;
        }
    } else {
        $logo_update = "";
        $logo_param = null;
    }

    try {
        $query = "UPDATE tb_franquias SET nome = :nome, link_insta = :link_insta, link_face = :link_face, link_landing_page = :link_landing_page, descricao = :descricao $logo_update WHERE id = :id";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':link_insta', $link_insta);
        $stmt->bindParam(':link_face', $link_face);
        $stmt->bindParam(':link_landing_page', $link_landing_page);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':id', $id);

        if ($logo_param) {
            $stmt->bindParam(':logo', $logo_param);
        }

        if ($stmt->execute()) {
            echo "Marca atualizada com sucesso!";
            header('Location: ./index.php');
            exit;
        } else {
            echo "Erro ao atualizar a marca.";
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
    <title>Editar Marca</title>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script type="module">
        import { ClassicEditor, Essentials, Paragraph, Bold, Italic, Font } from 'https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.js';

        document.addEventListener('DOMContentLoaded', function() {
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
                })
                .catch(error => {
                    console.error('Erro ao inicializar o CKEditor:', error);
                });
        });
    </script>
</head>
<body>
    <div class="container-full" id="container-full">
        <?php include("../menu.php"); ?>
    
        <main id="conteudo">
            <h1>Editar Marca</h1>
            <form action="editar_marca.php?id=<?php echo htmlspecialchars($id); ?>" method="POST" enctype="multipart/form-data">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($marca['nome']); ?>" required>
                <label for="link_insta">Link Instagram:</label>
                <input type="text" id="link_insta" name="link_insta" value="<?php echo htmlspecialchars($marca['link_insta']); ?>">
                <label for="link_face">Link Facebook:</label>
                <input type="text" id="link_face" name="link_face" value="<?php echo htmlspecialchars($marca['link_face']); ?>">
                <label for="link_landing_page">Link Landing Page:</label>
                <input type="text" id="link_landing_page" name="link_landing_page" value="<?php echo htmlspecialchars($marca['link_landing_page']); ?>">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" required><?php echo htmlspecialchars($marca['descricao']); ?></textarea>
                <label for="logo">Logo (deixe em branco para manter a atual):</label>
                <input type="file" id="logo" name="logo">
                <p style="margin-bottom: 30px;">Logo Atual: <?php echo htmlspecialchars($marca['logo']); ?></p>
                <button type="submit">Atualizar Marca</button>
            </form>
        </main>
    </div>

    <script src="../../assets/js/menu.js"></script>

</body>
</html>
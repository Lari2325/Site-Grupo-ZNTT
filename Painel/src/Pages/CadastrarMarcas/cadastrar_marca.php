<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../Login/index.php');
    exit();
}

include_once('../../../databaseconnect.php');

// Verifica se a conexão foi estabelecida
if (!$pdo) {
    die("Erro de conexão com o banco de dados.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $link_insta = isset($_POST['link_insta']) ? $_POST['link_insta'] : '';
    $link_face = isset($_POST['link_face']) ? $_POST['link_face'] : '';
    $link_landing_page = isset($_POST['link_landing_page']) ? $_POST['link_landing_page'] : '';
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';

    // Processar o upload do arquivo
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['logo']['tmp_name'];
        $fileName = $_FILES['logo']['name'];
        $fileSize = $_FILES['logo']['size'];
        $fileType = $_FILES['logo']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = uniqid() . '.' . $fileExtension; // Nome único para o arquivo
        $uploadFileDir = '../../Imagens/';
        $destPath = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            try {
                $query = "INSERT INTO tb_franquias (nome, logo, link_insta, link_face, link_landing_page, descricao) VALUES (:nome, :logo, :link_insta, :link_face, :link_landing_page, :descricao)";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
                $stmt->bindParam(':logo', $newFileName, PDO::PARAM_STR);
                $stmt->bindParam(':link_insta', $link_insta, PDO::PARAM_STR);
                $stmt->bindParam(':link_face', $link_face, PDO::PARAM_STR);
                $stmt->bindParam(':link_landing_page', $link_landing_page, PDO::PARAM_STR);
                $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
                
                if ($stmt->execute()) {
                    echo "Marca cadastrada com sucesso!";
                    header("Location: ./index.php");
                    exit();
                } else {
                    $errorInfo = $stmt->errorInfo();
                    echo "Erro ao cadastrar marca: " . $errorInfo[2];
                }
            } catch (PDOException $e) {
                echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
            }
        } else {
            echo "Erro ao mover o arquivo para o diretório de imagens.";
        }
    } else {
        $error = isset($_FILES['logo']['error']) ? $_FILES['logo']['error'] : 'Erro desconhecido';
        echo "Nenhum arquivo foi enviado ou ocorreu um erro no upload: " . $error;
    }
} else {
    echo "Método de requisição inválido.";
}
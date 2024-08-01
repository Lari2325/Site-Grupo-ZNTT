<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../Login/index.php');
    exit();
}

require_once("../../../databaseconnect.php");

if (!isset($_GET['id_artigo']) || empty($_GET['id_artigo'])) {
    echo "ID do artigo não fornecido.";
    exit;
}

$id_artigo = $_GET['id_artigo'];

try {
    $query = "SELECT imagem FROM tb_artigos WHERE id_artigo = :id_artigo";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_artigo', $id_artigo);
    $stmt->execute();
    $artigo = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$artigo) {
        echo "Artigo não encontrado.";
        exit;
    }

    if (!empty($artigo['imagem'])) {
        $imagem_path = '../../Imagens/' . $artigo['imagem'];
        if (file_exists($imagem_path)) {
            unlink($imagem_path);
        }
    }

    $query = "DELETE FROM tb_artigos WHERE id_artigo = :id_artigo";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_artigo', $id_artigo);

    if ($stmt->execute()) {
        echo "Artigo excluído com sucesso!";
        header('Location: ./index.php');
        exit;
    } else {
        echo "Erro ao excluir o artigo.";
    }
} catch (PDOException $e) {
    echo "Erro ao excluir artigo: " . $e->getMessage();
    exit;
}
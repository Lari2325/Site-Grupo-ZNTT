<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../Login/index.php');
    exit();
}

require_once("../../../databaseconnect.php");

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID da marca não fornecido.";
    exit;
}

$id = $_GET['id'];

try {
    $query = "SELECT logo FROM tb_franquias WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $marca = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$marca) {
        echo "Marca não encontrada.";
        exit;
    }

    // Excluir a marca do banco de dados
    $query = "DELETE FROM tb_franquias WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        if (!empty($marca['logo'])) {
            $logo_path = '../../Imagens/' . $marca['logo'];
            if (file_exists($logo_path)) {
                unlink($logo_path);
            }
        }

        echo "Marca excluída com sucesso!";
        header('Location: ./index.php');
        exit;
    } else {
        echo "Erro ao excluir a marca.";
    }
} catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
}
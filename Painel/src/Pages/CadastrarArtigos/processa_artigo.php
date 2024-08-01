<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../Login/index.php');
    exit();
}

require_once("../../../databaseconnect.php");

date_default_timezone_set('America/Sao_Paulo');

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
            try {
                $query = "INSERT INTO tb_artigos (titulo, texto_chamada, descricao, data_hora_postagem, imagem) VALUES (:titulo, :texto_chamada, :descricao, :data_hora_postagem, :imagem)";
                $stmt = $pdo->prepare($query);
                
                $stmt->bindParam(':titulo', $titulo);
                $stmt->bindParam(':texto_chamada', $texto_chamada);
                $stmt->bindParam(':descricao', $descricao);
                $stmt->bindParam(':data_hora_postagem', $data_hora_postagem);
                $stmt->bindParam(':imagem', $imagem_nome);
                
                if ($stmt->execute()) {
                    echo "Artigo cadastrado com sucesso!";
                    header('Location: ./index.php');
                } else {
                    echo "Erro ao cadastrar o artigo.";
                }
            } catch (PDOException $e) {
                echo "Erro na consulta: " . $e->getMessage();
            }
        } else {
            echo "Erro ao mover o arquivo de imagem.";
        }
    } else {
        echo "Nenhuma imagem foi enviada ou ocorreu um erro no envio.";
    }
}
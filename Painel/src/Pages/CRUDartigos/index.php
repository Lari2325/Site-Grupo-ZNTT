<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../Login/index.php');
    exit();
}

require_once("../../../databaseconnect.php");

$searchQuery = '';
if (isset($_GET['search'])) {
    $searchTerm = htmlspecialchars($_GET['search']);
    $searchQuery = "WHERE titulo LIKE :searchTerm";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Artigos</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container-full" id="container-full">
        <?php 
            include("../menu.php");
        ?>
    
        <main id="conteudo">
            <h1>Listar Artigos</h1>
            <a href="../CadastrarArtigos/index.php" class="btn-adicionar">Adicionar Novo Artigo</a>
    
            <form method="GET" style="margin-top: 30px;">
                <input type="text" name="search" placeholder="Buscar por título" value="<?php echo isset($searchTerm) ? htmlspecialchars($searchTerm) : ''; ?>">
                <button type="submit" >Buscar</button>
            </form>
    
            <div class="container-tabela">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Data e Hora de Postagem</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        try {
                            $query = "SELECT * FROM tb_artigos $searchQuery";
                            $stmt = $pdo->prepare($query);
                            if ($searchQuery) {
                                $stmt->bindValue(':searchTerm', "%$searchTerm%");
                            }
                            $stmt->execute();
        
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['id_artigo']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['titulo']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['data_hora_postagem']) . '</td>';
                                echo '<td>
                                        <a href="editar_artigo.php?id_artigo=' . htmlspecialchars($row['id_artigo']) . '" class="btn-editar">Editar</a>
                                        <a href="excluir_artigo.php?id_artigo=' . htmlspecialchars($row['id_artigo']) . '" onclick="return confirm(\'Tem certeza que deseja excluir este artigo?\')" class="btn-excluir">Excluir</a>
                                      </td>';
                                echo '</tr>';
                            }
                        } catch (PDOException $e) {
                            echo "<tr><td colspan='4'>Erro ao buscar artigos: " . $e->getMessage() . "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script src="../../assets/js/menu.js"></script>
</body>
</html>
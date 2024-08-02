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
    $searchQuery = "WHERE nome LIKE :searchTerm";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Marcas</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container-full" id="container-full">
        <?php 
            include("../menu.php");
        ?>
    
        <main id="conteudo">
            <h1>Listar Marcas</h1>
            <a href="../CadastrarMarcas/index.php" class="btn-adicionar">Adicionar Nova Marca</a>
    
            <form method="GET" style="margin-top: 30px;">
                <input type="text" name="search" placeholder="Buscar por nome" value="<?php echo isset($searchTerm) ? htmlspecialchars($searchTerm) : ''; ?>">
                <button type="submit">Buscar</button>
            </form>
    
            <div class="container-tabela">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        try {
                            $query = "SELECT id, nome FROM tb_franquias $searchQuery";
                            $stmt = $pdo->prepare($query);
                            if ($searchQuery) {
                                $stmt->bindValue(':searchTerm', "%$searchTerm%");
                            }
                            $stmt->execute();
        
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['nome']) . '</td>';
                                echo '<td>
                                        <a href="editar_marca.php?id=' . htmlspecialchars($row['id']) . '" class="btn-editar">Editar</a>
                                        <a href="excluir_marca.php?id=' . htmlspecialchars($row['id']) . '" onclick="return confirm(\'Tem certeza que deseja excluir esta marca?\')" class="btn-excluir">Excluir</a>
                                      </td>';
                                echo '</tr>';
                            }
                        } catch (PDOException $e) {
                            echo "<tr><td colspan='3'>Erro ao buscar marcas: " . $e->getMessage() . "</td></tr>";
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
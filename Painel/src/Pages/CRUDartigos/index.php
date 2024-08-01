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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: auto;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
        }
        .btn-edit, .btn-delete {
            margin-right: 10px;
        }
        .search-bar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php 
        include("../menu.php");
    ?>

    <div class="container">
        <h1>Listar Artigos</h1>
        <a href="../CadastrarArtigos/index.php" class="btn btn-primary mb-3">Adicionar Novo Artigo</a>

        <form method="GET" class="search-bar">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por título" value="<?php echo isset($searchTerm) ? htmlspecialchars($searchTerm) : ''; ?>">
                <button type="submit" class="btn btn-primary mt-2">Buscar</button>
            </div>
        </form>

        <table class="table table-striped">
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
                                <a href="editar_artigo.php?id_artigo=' . htmlspecialchars($row['id_artigo']) . '" class="btn btn-warning btn-edit">Editar</a>
                                <a href="excluir_artigo.php?id_artigo=' . htmlspecialchars($row['id_artigo']) . '" class="btn btn-danger btn-delete" onclick="return confirm(\'Tem certeza que deseja excluir este artigo?\')">Excluir</a>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
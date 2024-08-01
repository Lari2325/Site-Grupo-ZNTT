<?php

$page = 3;

include('../db.php');

$items_per_page = 6;

$pages = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$pages = max($pages, 1); // Garantir que a página não seja menor que 1

$offset = ($pages - 1) * $items_per_page;

try {
    $count_query = "SELECT COUNT(*) FROM tb_franquias";
    $count_stmt = $pdo->prepare($count_query);
    $count_stmt->execute();
    $total_items = $count_stmt->fetchColumn();

    $total_pages = ceil($total_items / $items_per_page);

    // Corrigir a página se ela for maior que o número total de páginas
    $pages = min($pages, $total_pages);

    $query = "SELECT id, nome, logo, link_insta, link_landing_page, link_face, descricao FROM tb_franquias LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':limit', $items_per_page, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar marcas: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo ZNTT - Sobre</title>
    <link rel="stylesheet" href="./src/assets/css/style.css">
    <link rel="stylesheet" href="./src/awesome/css/all.min.css">
</head>
<body>
    <?php
        include('../menu.php');
    ?>

    <main class="pg-3">
        <section class="titulo">
            <div class="container">
                <div class="text">
                    <h2><span>[</span> Nossas <span>]</span></h2>
                    <h1>Franquias</h1>
                </div>
                <div class="marcas">
                    <?php foreach ($marcas as $marca): ?>
                        <div class="marca">
                            <div class="header-marca">
                                <img src="./Painel/src/Imagens/<?php echo htmlspecialchars($marca['logo']); ?>" alt="Logo da <?php echo htmlspecialchars($marca['nome']); ?>">
                                <div class="group">
                                    <button onclick="window.open('<?php echo htmlspecialchars($marca['link_landing_page']); ?>', '_blank')">Seja um Franqueado</button>
                                    <ul>
                                        <?php
                                            $link_face = !$marca['link_face'] ? '' : '<li><a href="'. htmlspecialchars($marca['link_face']) .'" target="_blank"><i class="fa-brands fa-square-facebook"></i></a></li>' ;

                                            $link_insta = !$marca['link_insta'] ? '' : '<li><a href="'. htmlspecialchars($marca['link_insta']) .'" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>' ;

                                            echo $link_face;
                                            echo $link_insta;
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="desc">
                                <?php echo $marca['descricao']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="pagination">
                    <a href="?page=<?php echo max($pages - 1, 1); ?>" class="<?php echo $pages <= 1 ? 'disabled_pagination' : ''; ?>"><i class="fa-regular fa-arrow-left"></i></a>
                    <a href="?page=<?php echo min($pages + 1, $total_pages); ?>" class="<?php echo $pages >= $total_pages ? 'disabled_pagination' : ''; ?>"><i class="fa-regular fa-arrow-right"></i></a>
                </div>
            </div>
        </section>
    </main>

    <?php
        include('../footer.php');
    ?> 
</body>
</html>
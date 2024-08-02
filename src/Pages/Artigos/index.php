<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo ZNTT - Sobre</title>
    <link rel="stylesheet" href="./src/assets/css/style.css">
    <link rel="stylesheet" href="./src/awesome/css/all.min.css">
    <link rel="shortcut icon" href="./src/assets/img/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
        $page = 4;
        
        include('../menu.php');
        include('../db.php');
    ?>  

    <main class="pg-4">
        <section class="titulo-container">
            <div class="container">
                <div class="titulo">
                    <h2><span>[</span> Saiu na <span>]</span></h2>
                    <h1>Mídia</h1>
                </div>
            </div>
        </section>
        <section class="buscar-artigos">
            <div class="container">
                <div class="buscar-box">
                    <form action="" method="GET">
                        <input type="text" name="search" placeholder="Buscar mídia...">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>
        </section>
        <section class="artigos">
            <div class="container">
                <div class="cards">
                    <?php
                        $search = isset($_GET['search']) ? $_GET['search'] : '';

                        try {
                            if ($search) {
                                $query = "SELECT * FROM tb_artigos WHERE titulo LIKE :search OR texto_chamada LIKE :search OR descricao LIKE :search";
                                $stmt = $pdo->prepare($query);
                                $searchTerm = '%' . $search . '%';
                                $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
                            } else {
                                $query = "SELECT * FROM tb_artigos";
                                $stmt = $pdo->query($query);
                            }
                            
                            $stmt->execute();
                            $artigos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if (count($artigos) > 0) {
                                foreach ($artigos as $artigo) {
                                    $imagem = !empty($artigo['imagem']) ? './Painel/src/Imagens/' . $artigo['imagem'] : './src/assets/img/artigos/default.webp';
                                    $titulo = htmlspecialchars($artigo['titulo']);
                                    $texto_chamada = htmlspecialchars($artigo['texto_chamada']);
                                    $id_artigo = htmlspecialchars($artigo['id_artigo']);
                    ?>
                       <div class="card">
                            <a href="detalhe-artigo?post=<?php echo $id_artigo; ?>">
                                <img src="<?php echo $imagem; ?>" alt="<?php echo $titulo; ?>">
                            </a>
                            <a href="detalhe-artigo?post=<?php echo $id_artigo; ?>">
                                <h4><?php echo $titulo; ?></h4>
                            </a>
                            <a href="detalhe-artigo?post=<?php echo $id_artigo; ?>">
                                <p><?php echo $texto_chamada; ?></p>
                            </a>
                        </div>
                    <?php
                                }
                            } else {
                                echo "<p>Nenhum artigo encontrado.</p>";
                            }
                        } catch (PDOException $e) {
                            echo "Erro ao buscar artigos: " . $e->getMessage();
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>

    <?php
        include('../footer.php');
    ?> 
</body>
</html>
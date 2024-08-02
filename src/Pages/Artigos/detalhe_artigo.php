<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo ZNTT - Detalhe do Artigo</title>
    <link rel="stylesheet" href="./src/assets/css/style.css">
    <link rel="stylesheet" href="./src/awesome/css/all.min.css">
    <link rel="shortcut icon" href="./src/assets/img/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
        $page = 4;
        include('../menu.php');

        include('../db.php');

        if (!isset($_GET['post']) || empty($_GET['post'])) {
            echo "ID do artigo não fornecido.";
            exit;
        }

        $id_artigo = $_GET['post'];

        try {
            $query = "SELECT * FROM tb_artigos WHERE id_artigo = :id_artigo";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_artigo', $id_artigo, PDO::PARAM_INT);
            $stmt->execute();
            $artigo = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$artigo) {
                echo "Artigo não encontrado.";
                exit;
            }

            $titulo = htmlspecialchars($artigo['titulo']);
            $texto_chamada = htmlspecialchars($artigo['texto_chamada']);
            $descricao = $artigo['descricao'];
            $imagem = !empty($artigo['imagem']) ? './Painel/src/Imagens/' . $artigo['imagem'] : './src/assets/img/artigos/default.webp';
            
            $data = new DateTime($artigo['data_hora_postagem']);
            $data_postagem = $data->format('d/m/Y');
        } catch (PDOException $e) {
            echo "Erro ao buscar artigo: " . $e->getMessage();
            exit;
        }
    ?>  

    <main class="pg-5">
        <section class="artigo-detalhe">
            <div class="container">
                <div class="detalhes">
                    <a href="./na-midia" class="voltar"><i class="fa-regular fa-arrow-left"></i> Voltar</a>
                    <h1><?php echo $titulo; ?></h1>
                    <h6><?php echo $data_postagem; ?></h6>
                    <div class="imagem-artigo">
                        <img src="<?php echo $imagem; ?>" alt="<?php echo $titulo; ?>">
                    </div>
                    <div class="descricao">
                        <?php echo $descricao; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="artigos">
            <div class="container">
                <div class="cards">
                    <?php
                        try {
                            $query = "SELECT * FROM tb_artigos WHERE id_artigo != :id_artigo ORDER BY data_hora_postagem DESC LIMIT 3";
                            $stmt = $pdo->prepare($query);
                            $stmt->bindParam(':id_artigo', $id_artigo, PDO::PARAM_INT);
                            $stmt->execute();
                            $artigos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($artigos as $artigo) {
                                $imagem = !empty($artigo['imagem']) ? './Painel/src/Imagens/' . $artigo['imagem'] : './src/assets/img/artigos/default.webp';
                                $titulo = htmlspecialchars($artigo['titulo']);
                                $texto_chamada = htmlspecialchars($artigo['texto_chamada']);
                                $id_artigo = htmlspecialchars($artigo['id_artigo']);
                    ?>
                        <div class="card">
                            <a href="/site-grupozntt/detalhe-artigo?post=<?php echo $id_artigo; ?>">
                                <img src="<?php echo $imagem; ?>" alt="<?php echo $titulo; ?>">
                            </a>
                            <a href="/site-grupozntt/detalhe-artigo?post=<?php echo $id_artigo; ?>">
                                <h4><?php echo $titulo; ?></h4>
                            </a>
                            <a href="/site-grupozntt/detalhe-artigo?post=<?php echo $id_artigo; ?>">
                                <p><?php echo $texto_chamada; ?></p>
                            </a>
                        </div>
                    <?php
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
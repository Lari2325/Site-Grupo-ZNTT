<?php
header('Content-Type: application/xml');

include('./src/Pages/db.php');

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://grupozntt.com.br/</loc>
    </url>
    <url>
        <loc>https://grupozntt.com.br/quem-somos</loc>
    </url>
    <url>
        <loc>https://grupozntt.com.br/franquias</loc>
    </url>
    <url>
        <loc>https://grupozntt.com.br/na-midia</loc>
    </url>
    <url>
        <loc>https://grupozntt.com.br/contato</loc>
    </url>
    <?php
    try {
        $query = "SELECT id_artigo FROM tb_artigos";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $id_artigo = htmlspecialchars($row['id_artigo']);
            $url = "https://grupozntt.com.br/detalhe-artigo?post={$id_artigo}";
            echo '<url>';
            echo '<loc>' . $url . '</loc>';
            echo '</url>';
        }
    } catch (PDOException $e) {
        echo '<url>';
        echo '<loc>https://grupozntt.com.br/</loc>';
        echo '<error>' . htmlspecialchars($e->getMessage()) . '</error>';
        echo '</url>';
    }
    ?>
</urlset>
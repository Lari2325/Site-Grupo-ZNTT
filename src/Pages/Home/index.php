<?php 
    $page = 1;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo ZNTT - know-how em franquias</title>
    <link rel="stylesheet" href="./src/assets/css/style.css">
    <link rel="stylesheet" href="./src/awesome/css/all.min.css">
    <link rel="shortcut icon" href="./src/assets/img/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('./../menu.php'); ?>

    <main class="pg-1">
        <section class="hero">
            <div class="text">
                <h1>Nós já ajudamos + de <span>3.000</span> <br> EMPRESÁRIOS EM + DE <span>30 PAÍSES</span></h1>
                <h2>Empreenda com a segurança do maior grupo de <br> investimentos em franQuias do Brasil</h2>
            </div>
            <video width="100%" autoplay loop muted>
                <source src="./src/assets/video/1.mp4" type="video/mp4">
            </video>
        </section>
        <section class="about">
            <div class="container">
                <div class="box">
                    <div class="col-1">
                        <img src="./src/assets/img/bruno-quem-somos.webp" alt="">
                    </div>
                    <div class="col-2">
                        <h1>QUEM SOMOS</h1>
                        <p>Empresário e especialista no ramo de franquias há mais de 20 anos, Bruno Zanetti é acima de tudo uma referência neste mercado, um profissional com um vasto conhecimento e know-how e com uma enorme bagagem e experiência. <br><br> Dentro de sua carreira foi responsável por fundar o Grupo Zntt, um grupo que conta com a expansão e operação de mais de 10 marcas consolidadas no mercado, e com o número de mais de 3.000 franquias comercializadas em mais de 30 países.  <br><br> Sua vontade e desejo de empreender é o combustível que move e que explica o sucesso desse grupo que começou com uma ideia ambiciosa e promissora. <br><br> Atuando em vários segmentos, o grupo possui diversas certificações e prêmios pela ABF, Pequenas empresas & Grandes Negócios, entre outros. Sendo referência no mercado de franquias nacional e internacional.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="value">
            <div class="container">
                <div class="box-cards">
                    <div class="card">
                        <div class="icon">
                            <i class="fa-light fa-chart-mixed"></i>
                        </div>
                        <div class="desc">
                            <h4>
                                +30
                            </h4>
                            <h6>
                                Paises
                            </h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                             <i class="fa-light fa-chart-mixed"></i>
                        </div>
                        <div class="desc">
                            <h4>
                                +3000
                            </h4>
                            <h6>
                                franquias
                            </h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                             <i class="fa-light fa-chart-mixed"></i>
                        </div>
                        <div class="desc">
                            <h4>
                                +20
                            </h4>
                            <h6>
                                Anos de <br> mercado
                            </h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                             <i class="fa-light fa-chart-mixed"></i>
                        </div>
                        <div class="desc">
                            <h4>
                                +2.700.000
                            </h4>
                            <h6>
                                Clientes
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="carousel-segmento">
            <div class="col-1">
                <div class="container">
                    <div class="text">
                        <h1>Desenvolvimento Estratégico</h1>
                        <h2><span>[</span> de redes franqueadas <span>]</span></h2>
                    </div>
                </div>
            </div>
            <?php
            $carousels = [
                ["img" => "1"],
                ["img" => "2"],
                ["img" => "3"],
                ["img" => "4"],
                ["img" => "5"],
                ["img" => "6"]
            ];

            $resulCarolsel = count($carousels); 
            ?>
            <div class="topicos-box">
                <ul class="topicos">
                    <?php
                    for ($i = 0; $i < $resulCarolsel; $i++) {
    
                        $checked = '';
    
                        if ($i == 0){
                            $checked = ' checked';
                        }
                        echo '
                            <li>
                                <input type="radio" name="carousel-segmento" value="' . $i . '"'.$checked.'>
                            </li>
                        ';
                    }
                    ?>
                </ul>
            </div>
            <div class="col-2">
                <div class="carousel-segmentos" id="carousel-segmentos">
                    <?php
                    foreach ($carousels as $carousel) {
                        echo '
                            <div class="carousel-item">
                                <img src="./src/assets/img/carousel-segmentos/' . $carousel['img'] . '.webp" alt="" class="carousel-img">
                            </div>
                        ';
                    }
                    ?>
                </div>
            </div>
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="modalImg">
                <a class="prev">&#10094;</a>
                <a class="next">&#10095;</a>
            </div>
        </section>
        <section class="know-how">
            <div class="container">
                <div class="col-1">
                    <img src="./src/assets/img/icon-mapa-titulo.webp" alt="">         
                    <h1><span>Know-how</span><br> em todo o BRASIL<br> e exterior</h1>
                    <div class="divisoria"></div>
                    <p>Por duas décadas, temos auxiliado pequenas e médias empresas a alcançarem a liderança em seus mercados através do modelo de franchising.</p>
                    <div class="divisoria"></div>
                </div>
            </div>      
            <img src="./src/assets/img/mapa.webp" alt="" class="map">         
        </section>
        <section class="stalkeholders">
            <div class="container">
                <div class="box">
                    <div class="col-1">
                        <h2><span>[</span>  Confira o que dizem <span>]</span></h2>
                        <h1>nossos stakeholders</h1>
                    </div>
                    <div class="col-2">
                        <div class="carousel-stalkeholders">
                            <div id="carousel-stalkeholders">
                                <?php
                                $comentarios = [
                                    [
                                        'img' => '6',
                                        'nome' => 'Luan Vignoli',
                                        'cargo' => 'Ceo da T-FLOW',
                                        'desc' => 'A associação ao ZNTT se deu por ser uma holding renomada no mercado de fransching, isso trouxe segurança e credibilidade pra gente na franquia, e a experiência do grupo potencializou ainda mais o meu resultado que sozinho seria muito mais difícil, por isso já somamos 8 anos de parceria.'
                                    ],
                                    [
                                        'img' => '1',
                                        'nome' => 'Marcelo O.',
                                        'cargo' => 'Gerente de Operações',
                                        'desc' => 'Trabalhar no Grupo ZNTT é uma experiência enriquecedora. A empresa investe no desenvolvimento de seus funcionários e oferece diversas oportunidades de crescimento. O ambiente de trabalho é colaborativo e motivador.'
                                    ],
                                    [
                                        'img' => '2',
                                        'nome' => 'Juliana M.',
                                        'cargo' => 'Vendedor(a) Interno',
                                        'desc' => 'Sinto-me valorizada e motivada a cada dia no Grupo ZNTT. A cultura empresarial é inclusiva e há um forte senso de equipe. Tenho orgulho de fazer parte de uma empresa que se preocupa tanto com seus funcionários quanto com seus clientes.'
                                    ],
                                    [
                                        'img' => '3',
                                        'nome' => 'Kleber e Daniela',
                                        'cargo' => 'Franqueado Vida Leve',
                                        'desc' => 'É um dia de satisfação, alegria, estarmos iniciando a nossa trajetória, inaugurando a Vida Leve, gostaria de agradecer o apoio da equipe, pessoal das compras, da parte de estrutura de projeto, que nos apoiou desde o início, e a gente tá muito feliz, hoje o sentimento é só gratidão, a nossa loja ficou maravilhosa.'
                                    ],
                                    [
                                        'img' => '4',
                                        'nome' => 'Eduardo S.',
                                        'cargo' => 'Franqueado Mordidela',
                                        'desc' => 'A experiência com o Grupo ZNTT tem sido excelente. Desde o treinamento inicial até as atualizações constantes, sinto que estou sempre à frente no mercado. A equipe é extremamente profissional.'
                                    ],
                                    [
                                        'img' => '5',
                                        'nome' => 'Miquéias',
                                        'cargo' => 'Franqueado Bem',
                                        'desc' => 'A experiência com o Grupo ZNTT tem sido excelente. Desde o treinamento inicial até as atualizações constantes, sinto que estou sempre à frente no mercado. A equipe é extremamente profissional.'
                                    ],
                                    [
                                        'img' => '6',
                                        'nome' => 'Luan Vignoli',
                                        'cargo' => 'Ceo da T-FLOW',
                                        'desc' => 'A associação ao ZNTT se deu por ser uma holding renomada no mercado de fransching, isso trouxe segurança e credibilidade pra gente na franquia, e a experiência do grupo potencializou ainda mais o meu resultado que sozinho seria muito mais difícil, por isso já somamos 8 anos de parceria.'
                                    ],
                                    [
                                        'img' => '1',
                                        'nome' => 'Marcelo O.',
                                        'cargo' => 'Gerente de Operações',
                                        'desc' => 'Trabalhar no Grupo ZNTT é uma experiência enriquecedora. A empresa investe no desenvolvimento de seus funcionários e oferece diversas oportunidades de crescimento. O ambiente de trabalho é colaborativo e motivador.'
                                    ]
                                ];

                                for($i = 0; $i <= 2; $i++){
                                    echo '
                                        <div class="item">
                                            <div class="perfil">
                                                <img src="./src/assets/img/depoimento-perfil/'. $comentarios[$i]['img'] .'.webp" alt="">
                                                <div class="inf">
                                                    <h4>'. $comentarios[$i]['nome'] .'</h4>
                                                    <h6>'. $comentarios[$i]['cargo'] .'</h6>
                                                </div>
                                            </div>
                                            <div class="desc">
                                                <p>"'. $comentarios[$i]['desc'] .'"</p>
                                            </div>
                                        </div>
                                    ';
                                }

                            ?>
                            </div>

                            <div class="arrows">
                                <i class="fa-solid fa-arrow-left" onclick="prevSlide()"></i>
                                <i class="fa-solid fa-arrow-right" onclick="nextSlide()"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divisao">
                    <div class="mais"></div>
                </div>
                <div class="col-3">
                    <h1>O GRUPO ZNTT É UMA CONEXÃO <br> ENTRE VOCÊ E O SUCESSO.</h1>
                    <p>Conheça nossas operações, avalie seu perfil e escolha com qual área de negócio você mais se <br> identifica, e torne-se um franqueado ou franqueador de sucesso tendo seu próprio negócio.</p>
                    <button onclick="location.href='contato'">Saiba Mais</button>
                </div>
            </div>
        </section>
        <section class="premiacoes">
            <div class="container">
                <div class="box">
                    <div class="col-1">
                        <h1>Premiações</h1>
                    </div>
                    <div class="col-2">
                        <img src="./src/assets/img/premio.webp" alt="" class="premio-img">
                        <div class="box-premiacoes">
                            <div class="premio">
                                <img src="./src/assets/img/logo-mordidela.webp" alt="">
                                <div class="card">
                                    <p><strong>3 anos consecutivos</strong> <br> Franquia 5 estrelas <br> do brasil.</p>
                                </div>
                            </div>
                            <div class="premio">
                                <img src="./src/assets/img/bem-logo.webp" alt="">
                                <div class="card">
                                    <p><strong>2 anos consecutivos</strong> <br>franquia 5 estrelas.</p>
                                </div>
                                <div class="card">
                                    <p><strong>5 anos premiados </strong> da feira<br> ABF com <strong>stand sustentavel</strong>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="premio">
                            <img src="./src/assets/img/vida-leve-logo.webp" alt="">
                            <div class="card">
                                <p><strong> 3 anos consecutivos</strong> <br> Franquia 5 estrelas <br> do brasil.</p>
                            </div>
                            <div class="card">
                                <p>Vida Leve <strong>premio de <br> franquia internacional.</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="artigos">
            <div class="container">
                <div class="text">
                    <h2><span>[</span> saiu na <span>]</span></h2>
                    <h1>Mídia</h1>
                </div>
                <div class="cards">
                    <?php
                    include('../db.php');

                    try {
                        $query = "SELECT * FROM tb_artigos ORDER BY data_hora_postagem DESC LIMIT 3";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute();
                        $artigos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if ($artigos) {

                            
                            foreach ($artigos as $artigo) {
                                $imagem = !empty($artigo['imagem']) ? './Painel/src/Imagens/' . $artigo['imagem'] : './src/assets/img/artigos/default.webp';

                                echo'
                                    <div class="card">
                                        <a href="detalhe-artigo?post='. htmlspecialchars($artigo['id_artigo']) .'">
                                            <img src="'. $imagem .'" alt="">
                                        </a>
                                        <a href="detalhe-artigo?post='. htmlspecialchars($artigo['id_artigo']) .'">
                                            <h4>'. htmlspecialchars($artigo['titulo']) .'</h4>
                                        </a>
                                        <a href="detalhe-artigo?post='. htmlspecialchars($artigo['id_artigo']) .'">
                                            <p>'. htmlspecialchars($artigo['texto_chamada']) .'</p>
                                        </a>
                                    </div>
                                ';
                            }
                        } else {
                            echo "Nenhum artigo encontrado.";
                        }
                    } catch (PDOException $e) {
                        echo "Erro ao buscar artigos: " . $e->getMessage();
                    }
                    ?>
                </div>
            </div>
        </section>
        <section class="faq">
            <div class="container">
                <div class="text">
                    <h2><span>[</span> DÚVIDAS FREQUENTES <span>]</span></h2>
                    <h1>FAQ</h1>
                </div>
                <div class="box-faq" id="faq">
                    <article>
                        <details open>
                            <summary>O que é HTML5?</summary>
                            <p>HTML5 é a quinta e mais recente versão do HTML, a linguagem de marcação utilizada para estruturar e apresentar conteúdo na web. Ele introduz novos elementos, atributos e comportamentos, além de uma melhor semântica e suporte para multimídia.</p>
                        </details>
                    </article>
                    <article>
                        <details>
                            <summary>Para que serve a tag &lt;section&gt;?</summary>
                            <p>A tag &lt;section&gt; é usada para definir seções em um documento. Cada seção deve ser tematicamente relacionada e pode conter um cabeçalho. É utilizada para agrupar conteúdo de forma lógica e semântica.</p>
                        </details>
                    </article>
                    <article>
                        <details>
                            <summary>Qual a diferença entre &lt;div&gt; e &lt;section&gt;?</summary>
                            <p>A tag &lt;div&gt; é um contêiner genérico sem significado semântico específico, usada principalmente para aplicar estilos ou scripts. Já a tag &lt;section&gt; é semântica e define uma seção de conteúdo relacionada dentro de um documento.</p>
                        </details>
                    </article>
                    <article>
                        <details>
                            <summary>O que são elementos semânticos?</summary>
                            <p>Elementos semânticos são aqueles que possuem significado intrínseco e descrevem claramente seu propósito e o tipo de conteúdo que abrigam. Exemplos incluem &lt;header&gt;, &lt;footer&gt;, &lt;article&gt;, &lt;section&gt; e &lt;nav&gt;.</p>
                        </details>
                    </article>
                    <article>
                        <details>
                            <summary>Como incluir um vídeo em HTML5?</summary>
                            <p>Para incluir um vídeo em HTML5, utiliza-se a tag &lt;video&gt;. Por exemplo:</p>
                        </details>
                    </article>
                </div>
            </div>
        </section>
    </main>
    <?php include('./../footer.php'); ?>

    <script src="./src/assets/js/faq.js"></script>
    <script src="./src/assets/js/modal.js"></script>
    <script src="./src/assets/js/comentarios.js"></script>
    <script>
        const comentarios = <?php echo json_encode($comentarios); ?>;
        let startIndex = 0;

        function renderCarousel(start) {
            const carouselItems = document.getElementById('carousel-stalkeholders');
            carouselItems.innerHTML = '';
            for (let i = start; i < start + 3; i++) {
                if (i < comentarios.length) {
                    carouselItems.innerHTML += `
                        <div class="item">
                            <div class="perfil">
                                <img src="./src/assets/img/depoimento-perfil/${comentarios[i].img}.webp" alt="">
                                <div class="inf">
                                    <h4>${comentarios[i].nome}</h4>
                                    <h6>${comentarios[i].cargo}</h6>
                                </div>
                            </div>
                            <div class="desc">
                                <p>"${comentarios[i].desc}"</p>
                            </div>
                        </div>
                    `;
                }
            }
        }

        function nextSlide() {
            if (startIndex + 3 < comentarios.length) {
                startIndex++;
                renderCarousel(startIndex);
            }
        }

        function prevSlide() {
            if (startIndex > 0) {
                startIndex--;
                renderCarousel(startIndex);
            }
        }

        renderCarousel(startIndex);
    </script>
    <script src="./src/assets/js/carousel-segmentos.js"></script>
</body>
</html>
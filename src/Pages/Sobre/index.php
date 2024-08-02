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
        $page = 2;
        include('../menu.php');
    ?>  

    <main class="pg-2">
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

        <section class="time">
            <div class="container">
                <div class="titulo">
                    <img src="./src/assets/img/icone-titulo-sobre.webp" alt="">
                    <h1>Nosso Time</h1>
                </div>
                <div class="composicao-sobre">
                    <img src="./src/assets/img/composicao-sobre-nos.webp" alt="">
                </div>
                <div class="cards">
                    <div class="card">
                        <h4>Estefania Garutti</h4>
                        <div class="divisao"></div>
                        <h6>Diretora Operacional</h6>
                    </div>
                    <div class="card">
                        <h4>Bruno Zanetti</h4>
                        <div class="divisao"></div>
                        <h6>CEO do Grupo ZNTT</h6>
                    </div>
                    <div class="card">
                        <h4>Aroldo Jorge</h4>
                        <div class="divisao"></div>
                        <h6>Diretor Comercial</h6>
                    </div>
                </div>
                <div class="box-descricao">
                    <p>O Grupo Zntt é liderado pelos CEOs Bruno Zanetti, Aroldo Jorge e Estefânia Garutti. Com uma combinação de experiência e inovação, eles conduzem a empresa com visão e excelência, impulsionando o crescimento e o sucesso.</p>
                </div>
            </div>
        </section>

        <section class="timeline">
            <div class="container">
                <div class="text">
                    <h2><span>[</span> TimeLine <span>]</span></h2>
                    <h1>GRUPO ZNTT</h1>
                </div>
            </div>
            <div class="bg-cards">
                <div class="container">
                    <div class="cards">

                        <?php

                        $timeline = [
                            [
                                'data' => '20<span>15</span>',
                                'descricao' => 'Reconhecimento pela ABF como 20 melhores do segmento',
                                'logo' => '1'
                            ],
                            [
                                'data' => '20<span>16</span>',
                                'descricao' => 'Prêmio ABF estande sustentável',
                                'logo' => '2'
                            ],
                            [
                                'data' => '20<span>17</span>',
                                'descricao' => 'Reconhecimento pela ABF como 20 melhores do segmento',
                                'logo' => '2'
                            ],
                            [
                                'data' => '20<span>18</span>',
                                'descricao' => 'Prêmio ABF estande sustentável, Mordidela vendeu mais de 10 milhões de salgados.',
                                'logo' => '2'
                            ],
                            [
                                'data' => '20<span>19</span>',
                                'descricao' => 'Prêmio ABF estande sustentável.',
                                'logo' => '2'
                            ],
                            [
                                'data' => '20<span>23</span>',
                                'descricao' => 'Certificado de franquia internacional ABF.',
                                'logo' => '3'
                            ],
                            [
                                'data' => '20<span>23</span>',
                                'descricao' => 'Empresa 5<br> estrelas.',
                                'logo' => '4'
                            ],
                            [
                                'data' => '20<span>24</span>',
                                'descricao' => 'Franqueada<br> do ano.',
                                'logo' => '3'
                            ],
                            [
                                'data' => '20<span>24</span>',
                                'descricao' => 'Empresa 5<br> estrelas.',
                                'logo' => '4'
                            ]
                        ];

                        ?>

                        <?php
                            for($i = 0; $i < 9; $i++) {

                                $afterRisco = '';

                                if($i == 3 || $i == 8){
                                    $afterRisco = ' afterRisco';
                                }

                                $beforeRisco = '';

                                if($i == 0 || $i == 4){
                                    $beforeRisco = ' beforeRisco';
                                }

                                $dn = '';

                                if($i == 8){
                                    $dn = ' dn';
                                }

                                echo '
                                    <div class="card">
                                        <div class="conteudo">
                                            <h4>'. $timeline[$i]['data'] .'</h4>
                                            <h6>'. $timeline[$i]['descricao'] .'</h6>
                                        </div>
                                        <div class="marca">
                                            <img src="./src/assets/img/logos-timeline/'. $timeline[$i]['logo'] .'.webp" alt="">
                                        </div>
                                        <div class="ponto'. $dn .'"></div>
                                        <div class="risco'. $afterRisco .''. $beforeRisco .''. $dn .'"></div>
                                    </div>
                                ';

                                if($i == 3){
                                    echo '<div class="quebra"></div>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="value">
            <div class="icon-bottom">
                <i class="fa-regular fa-angle-down"></i>
            </div>
            <div class="container">
                <div class="text">
                    <h2><span>[</span> nossos <span>]</span></h2>
                    <h1>NÚMEROS</h1>
                </div>
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
    </main>

    <?php
        include('../footer.php');
    ?>  
</body>
</html>
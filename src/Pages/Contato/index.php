<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo ZNTT - Contato</title>
    <link rel="stylesheet" href="./src/assets/css/style.css">
    <link rel="stylesheet" href="./src/awesome/css/all.min.css">
</head>
<body>
    <?php
        $page = '';
        include('../menu.php');
    ?>  
    <main class="pg-6">
        <section>
            <div class="container">
                <div class="box">
                    <div class="text">
                        <h2>[ fale com nosso atendimento ]</h2>
                        <h1>Envia-nos uma mensagem </h1>
                    </div>
                    <div class="form">
                        <?php
                            $formulario = $_GET['formulario'] ?? '';
                            
                            if($formulario == 'success'){
                               echo '
                                    <div class="mensagem-sucesso">
                                        <h4>Formulario enviado com sucesso!</h4>
                                    </div>
                               ';
                            }else if($formulario == 'error'){
                               echo '
                                    <div class="mensagem-error">
                                        <h4>Houve um error ao enviar sua mensagem. Tente novamente mais tarde!</h4>
                                    </div>
                               ';
                            } 
                        ?>

                        <form id="formulario" action="./Form/enviar.php" method="POST">
                            <div class="group">
                                <div class="groupError">
                                    <div id="nomeErro" class="textError"></div>
                                    <input type="text" id="nome" name="nome" placeholder="Nome">
                                </div>
                                <div class="groupError">
                                    <div id="emailErro" class="textError"></div>
                                    <input type="email" id="email" name="email" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="group">
                                <div class="groupError">
                                    <div id="telefoneErro" class="textError"></div>
                                    <input type="tel" id="telefone" name="telefone" placeholder="Telefone ou celular">
                                </div>
                                <div class="groupError">
                                    <input type="text" id="assunto" name="assunto" placeholder="Assunto">
                                </div>
                            </div>

                            <textarea id="mensagem" name="mensagem" rows="5" placeholder="Mensagem"></textarea>

                            <button type="submit">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
        include('../footer.php');
    ?>  

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function disparo() {
                let nome = document.getElementById('nome');
                let email = document.getElementById('email');
                let telefone = document.getElementById('telefone');

                let nomeErro = document.getElementById('nomeErro');
                let emailErro = document.getElementById('emailErro');
                let telefoneErro = document.getElementById('telefoneErro');

                function validarCampos() {
                    let valido = true;

                    if (nome.value.trim() === '') {
                        nomeErro.textContent = 'O nome é obrigatório.';
                        valido = false;
                    } else if (nome.value.trim().length < 3) {
                        nomeErro.textContent = 'O nome deve ter pelo menos 3 caracteres.';
                        valido = false;
                    } else {
                        nomeErro.textContent = '';
                    }

                    if (email.value.trim() === '') {
                        emailErro.textContent = 'O email é obrigatório.';
                        valido = false;
                    } else if (email.value.trim().length < 6) {
                        emailErro.textContent = 'O email deve ter pelo menos 6 caracteres.';
                        valido = false;
                    } else {
                        emailErro.textContent = '';
                    }

                    let telefoneNumeros = telefone.value.replace(/\D/g, ''); // Remove tudo que não é número
                    if (telefoneNumeros === '') {
                        telefoneErro.textContent = 'O telefone é obrigatório.';
                        valido = false;
                    } else if (telefoneNumeros.length < 11) {
                        telefoneErro.textContent = 'O telefone deve ter pelo menos 11 números.';
                        valido = false;
                    } else {
                        telefoneErro.textContent = '';
                    }

                    return valido;
                }

                let formulario = document.getElementById('formulario');
                formulario.addEventListener('submit', function(event) {
                    if (!validarCampos()) {
                        event.preventDefault(); 
                    }
                });
            }

            disparo();

            // Mensagem temporária e redirecionamento
            const mensagemSucesso = document.querySelector('.mensagem-sucesso');
            const mensagemError = document.querySelector('.mensagem-error');

            if (mensagemSucesso || mensagemError) {
                setTimeout(() => {
                    if (mensagemSucesso) {
                        mensagemSucesso.style.display = 'none';
                    }
                    if (mensagemError) {
                        mensagemError.style.display = 'none';
                    }
                }, 5000);

                setTimeout(() => {
                    window.location.href = './contato';
                }, 5100);
            }
        });
    </script>
</body>
</html>
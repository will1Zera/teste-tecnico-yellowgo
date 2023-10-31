<?php 
    require_once("config/connect.php");
    require_once("config/globals.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");

    $message = new Message($BASE_URL);
    $flassMessage = $message->getMessage();

    if(!empty($flassMessage["msg"])){
        $message->clearMessage();
    }

    $userDao = new UserDao($conn, $BASE_URL);
    $userData = $userDao->verifyToken(false);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.css" integrity="sha512-azoUtNAvw/SpLTPr7Z7M+5BPWGOxXOqn3/pMnCxyDqOiQd4wLVEp0+AqV8HcoUaH02Lt+9/vyDxwxHojJOsYNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Icons font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>views/css/index.css"/>
    <link rel="stylesheet" href="<?= $BASE_URL ?>views/css/header.css"/>
    <link rel="stylesheet" href="<?= $BASE_URL ?>views/css/auth.css"/>
    <link rel="stylesheet" href="<?= $BASE_URL ?>views/css/ticket.css"/>
    <title>Osirnet - Suporte</title>
</head>
<body>
    <header id="header">
        <div class="header__container">
            <div>
                <a href="<?= $BASE_URL ?>"><img src="<?= $BASE_URL ?>views/img/logo.png" alt="Logo" class="header__image"></a>
            </div>
            <div class="header__container-nav">
                <nav id="nav">
                    <ul class="header__ul" id="nav__li">
                        <!-- Changes depending on the user -->
                        <?php if($userData): ?>
                            <li><a class="header__li" href="<?= $BASE_URL ?>">Solicitações</a></li>
                            <li><a class="header__li" href="create-ticket">Criar solicitação</a></li>
                            <li><a class="header__li" href="logout">Sair</a></li>
                        <?php else: ?>
                            <li><a class="header__li" href="login">Entrar</a></li>
                            <li><a class="header__li" href="register">Cadastrar</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- Display system message -->
    <?php if(!empty($flassMessage["msg"])): ?>
        <div class="msg-container">
            <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?><i class="fa-solid fa-x" onclick="fecharMensagem(this)"></i></p>
        </div>
        <script>
            function fecharMensagem(e) {
                var mensagem = e.closest('.msg-container');
                mensagem.classList.add('hidden');
            }
            setTimeout(function() {
                var msgContainer = document.querySelector('.msg-container');
                if (msgContainer) {
                    msgContainer.style.animation = 'slideOut 0.5s ease forwards';
                    setTimeout(function() {
                        msgContainer.style.display = 'none';
                    }, 500);
                }
            }, 4000);
        </script>
    <?php endif; ?>
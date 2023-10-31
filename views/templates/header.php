<?php 
    require_once("config/connect.php");
    require_once("config/globals.php");
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
                        <li><a class="header__li" href="login">Entrar</a></li>
                        <li><a class="header__li" href="register">Cadastrar</a></li>
                        <li><a class="header__li" href="create-ticket">Criar ticket</a></li>
                        <li><a class="header__li" href="logout">Sair</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
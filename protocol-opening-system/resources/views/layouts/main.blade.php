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
    <link rel="stylesheet" href="/css/index.css"/>
    <link rel="stylesheet" href="/css/header.css"/>
    <link rel="stylesheet" href="/css/auth.css"/>
    <link rel="stylesheet" href="/css/ticket.css"/>
    <title>Osirnet - Suporte</title>
</head>
<body>
    <header id="header">
        <div class="header__container">
            <div>
                <a href="/"><img src="/img/logo.png" alt="Logo" class="header__image"></a>
            </div>
            <div class="header__container-nav">
                <nav id="nav">
                    <ul class="header__ul" id="nav__li">
                        <li><a class="header__li" href="/login">Entrar</a></li>
                        <li><a class="header__li" href="/register">Cadastrar</a></li>
                        <li><a class="header__li" href="/">Solicitações</a></li>
                        <li><a class="header__li" href="/ticket">Criar solicitação</a></li>
                        <li><a class="header__li" href="#">Sair</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Bootstrap js and JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/js/bootstrap.js" integrity="sha512-hidrIwTPV6f4zhtlHGC2IelVMrCqiHkHC9AuFJk22S95fMp5qnbhz2uLw5WH+lVWEWKg5nbRPkBsa4nNPGubsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>

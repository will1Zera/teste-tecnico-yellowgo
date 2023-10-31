<?php
    include 'controllers/TicketController.php';
    include 'controllers/AuthController.php';

    // Get whatever is typed in the url
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    switch($url){
        
        case '/teste-tecnico-yellowgo/':
            TicketController::index();
        break;

        case '/teste-tecnico-yellowgo/login':
            AuthController::login();
        break;

        case '/teste-tecnico-yellowgo/register':
            AuthController::register();
        break;

        case '/teste-tecnico-yellowgo/create-ticket':
            TicketController::create();
        break;

        case '/teste-tecnico-yellowgo/ticket-process':
            TicketController::ticketProcess();
        break;

        case '/teste-tecnico-yellowgo/auth-process':
            AuthController::auth();
        break;

        case '/teste-tecnico-yellowgo/logout':
            AuthController::logout();
        break;
        
        default:
            TicketController::error();
    }
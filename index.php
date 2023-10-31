<?php
    include 'controllers/TicketController.php';

    // Get whatever is typed in the url
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    switch($url){
        
        case '/teste-tecnico-yellowgo/':
            TicketController::index();
        break;

        default:
            TicketController::error();
    }
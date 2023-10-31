<?php 
    require_once("config/connect.php");
    require_once("config/globals.php"); 
    require_once("models/User.php");
    require_once("models/Ticket.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");
    require_once("dao/TicketDAO.php");

    $userDao = new UserDAO($conn, $BASE_URL);
    $ticketDao = new TicketDAO($conn, $BASE_URL);
    $message = new Message($BASE_URL);

    // Retrieve the form type
    $type = filter_input(INPUT_POST, "type-form");

    $userData = $userDao->verifyToken();

    // Register ticket
    if ($type === "create"){
        // Retrieve input data
        $title = filter_input(INPUT_POST, "title");
        $type = filter_input(INPUT_POST, "type");
        $description = filter_input(INPUT_POST, "description");

        // Validations
        if($title && $type && $description){
            // Register a ticket
            $ticket = new Ticket();

            $ticketProtocol = $ticket->generateProtocol();

            $ticket->users_id = $userData->id;
            $ticket->title = $title;
            $ticket->protocol = $ticketProtocol;
            $ticket->type = $type;
            $ticket->description = $description;

            $ticketDao->create($ticket);

            $message->setMessage("Solicitação cadastrada com sucesso.", "success", "./");
        } else{
            $message->setMessage("Preencha todos os campos.", "error", "back");
        }
    } else{
        $message->setMessage("Ocorreu um erro no sistema.", "error", "login");
    }
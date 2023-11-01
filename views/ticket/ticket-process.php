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

    } elseif($type === "delete"){
        // Get the ticket id
        $id = filter_input(INPUT_POST, "id");
        $ticket = $ticketDao->findById($id);

        if($ticket){

            if($ticket->users_id === $userData->id){
                
                $ticketDao->destroy($ticket->id);
            } else{
                $message->setMessage("Ocorreu um erro no sistema.", "error", "login");
            }
        } else{
            $message->setMessage("Ocorreu um erro no sistema.", "error", "login");
        }

    } elseif($type === "update"){
        // Get the ticket id
        $id = filter_input(INPUT_POST, "id");
        $ticket = $ticketDao->findById($id);

        // Retrieve input data
        $responsable_name = filter_input(INPUT_POST, "responsable_name");
        $closure_reason = filter_input(INPUT_POST, "closure_reason");

        // Validations
        if($responsable_name && $closure_reason){
            // Update a ticket
            $ticket->responsable_name = $responsable_name;
            $ticket->closure_reason = $closure_reason;

            $ticketDao->update($ticket);
        } else{
            $message->setMessage("Preencha todos os campos.", "error", "back");
        }
    } else{
        $message->setMessage("Ocorreu um erro no sistema.", "error", "login");
    }
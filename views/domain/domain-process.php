<?php 
    require_once("config/connect.php");
    require_once("config/globals.php"); 
    require_once("models/User.php");
    require_once("models/Domain.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");
    require_once("dao/DomainDAO.php");

    $userDao = new UserDAO($conn, $BASE_URL);
    $domainDao = new DomainDAO($conn, $BASE_URL);
    $message = new Message($BASE_URL);

    // Retrieve the form type
    $type = filter_input(INPUT_POST, "type-form");
    $userData = $userDao->verifyToken();

    // Register domain
    if ($type === "create"){
        // Retrieve input data
        $name = filter_input(INPUT_POST, "name");
        $domain_type = filter_input(INPUT_POST, "domain_type");
        $user_type = filter_input(INPUT_POST, "user_type");

        // Validations
        if($name && $domain_type && $user_type){
            // Register a domain
            $domain = new Domain();

            $domain->users_id = $userData->id;
            $domain->name = $name;
            $domain->domain_type = $domain_type;
            $domain->user_type = $user_type;

            $domainDao->create($domain);

            $message->setMessage("Domínio cadastrado com sucesso.", "success", "domain");
        } else{
            $message->setMessage("Preencha todos os campos.", "error", "back");
        }

    } elseif($type === "delete"){
        // Get the domain id
        $id = filter_input(INPUT_POST, "id");
        $domain = $domainDao->findById($id);

        if($domain){

            if($domain->users_id === $userData->id){
                
                $domainDao->destroy($domain->id);
            } else{
                $message->setMessage("Ocorreu um erro no sistema.", "error", "login");
            }
        } else{
            $message->setMessage("Ocorreu um erro no sistema.", "error", "login");
        }
        
    } elseif($type === "update"){
        
    } else{
        $message->setMessage("Ocorreu um erro no sistema.", "error", "login");
    }
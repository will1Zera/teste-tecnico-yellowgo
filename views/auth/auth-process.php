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
    $type = filter_input(INPUT_POST, "type");

    // Register user
    if ($type === "register"){
        // Retrieve input data
        $name = filter_input(INPUT_POST, "name");
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

        // Validations
        if($name && $email && $password){

            if($password === $confirmpassword){
                $user = new User();
                $domainEmail = $user->domainEmail($email);
                $domain = $domainDao->findByDomainType($domainEmail);

                if($domain->user_type){

                    if($userDao->findByEmail($email) === false){
                        // Register a user
                        $userToken = $user->generateToken();
                        $finalPassword = $user->generatePassword($password);
    
                        $user->id_user_type = $domain->user_type;
                        $user->name = $name;
                        $user->email = $email;
                        $user->password = $finalPassword;
                        $user->token = $userToken;
                        $user->status = 1;
    
                        $userDao->create($user);
    
                        $message->setMessage("Cadastro realizado com sucesso.", "success", "login");
                    } else{ 
                        $message->setMessage("E-mail já cadastrado, tente novamente.", "error", "back");
                    }
                } else{
                    $message->setMessage("Domínio de e-mail não permitido.", "error", "back");
                }
                
            } else{ 
                $message->setMessage("As senhas devem ser iguais.", "error", "back");   
            }
        } else{
            $message->setMessage("Preencha todos os campos.", "error", "back");
        }

    // Login user
    } else if ($type === "login"){
        // Retrieve input data 
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");

        if($userDao->authenticateUser($email, $password)){
            $message->setMessage("Login realizado com sucesso.", "success", "./");
        } else{
            $message->setMessage("E-mail e/ou senha incorretos.", "error", "back");
        }
    } else{ 
        $message->setMessage("Ocorreu um erro no sistema.", "error", "login"); 
    }
?>
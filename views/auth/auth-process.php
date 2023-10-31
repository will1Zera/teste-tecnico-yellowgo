<?php 
    require_once("config/connect.php");
    require_once("config/globals.php"); 
    require_once("models/User.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");

    $userDao = new UserDAO($conn, $BASE_URL);
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
                
                if($userDao->findByEmail($email) === false){
                    // Register a user
                    $user = new User();

                    $userToken = $user->generateToken();
                    $finalPassword = $user->generatePassword($password);

                    $user->id_user_type = 3;
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
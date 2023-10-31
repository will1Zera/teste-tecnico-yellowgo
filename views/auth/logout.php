<?php 
    require_once("dao/UserDAO.php");
    require_once("config/connect.php");
    require_once("config/globals.php"); 

    $userDao = new userDAO($conn, $BASE_URL);

    if($userDao){
        $userDao->destroyToken();
    }


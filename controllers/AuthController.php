<?php
    class AuthController{
       public static function login(){
            include 'views/templates/header.php';
            include 'views/auth/login.php';
            include 'views/templates/footer.php';
       }

       public static function register(){
        include 'views/templates/header.php';
        include 'views/auth/register.php';
        include 'views/templates/footer.php';
   }
    }
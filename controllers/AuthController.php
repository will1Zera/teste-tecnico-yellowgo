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

          public static function auth(){
               include 'views/auth/auth-process.php';
          }

          public static function logout(){
               include 'views/auth/logout.php';
          }
     }
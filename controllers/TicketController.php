<?php
     class TicketController{
          public static function index(){
               include 'views/templates/header.php';
               include 'views/index.php';
               include 'views/templates/footer.php';
          }

          public static function error(){
               include 'views/templates/header.php';
               include 'views/error.php';
               include 'views/templates/footer.php';
          }

          public static function create(){
               include 'views/templates/header.php';
               include 'views/ticket/create.php';
               include 'views/templates/footer.php';
          }
     }
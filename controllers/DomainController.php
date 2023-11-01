<?php
    class DomainController{
        public static function dashboard(){
            include 'views/templates/header.php';
            include 'views/domain/dashboard.php';
            include 'views/templates/footer.php';
        }

        public static function create(){
            include 'views/templates/header.php';
            include 'views/domain/create.php';
            include 'views/templates/footer.php';
        }

        public static function domainProcess(){
            include 'views/domain/domain-process.php';
        }
    }
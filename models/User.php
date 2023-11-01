<?php

    class User{
        public $id;
        public $id_user_type;
        public $name;
        public $email;
        public $password;
        public $token;
        public $status;

        // Function that generates token
        public function generateToken(){
            return bin2hex(random_bytes(50));
        }

        // Function that generates password
        public function generatePassword($password){
            return password_hash($password, PASSWORD_DEFAULT);
        }

        /* Function that checks email
        public function checkEmail($email) {
            $domain = substr(strrchr($email, "@"), 1);
            switch ($domain) {
                case 'osirnet.cliente.com.br':
                    return 3;
                case 'osirnet.suporte.com.br':
                    return 2;
                case 'osirnet.com.br':
                    return 1;
                default:
                    return null;
            }
        }
        */

        // Function that generates domain email
        public function domainEmail($email) {
            $domain = substr(strrchr($email, "@"), 1);
            return $domain;
        }
    }
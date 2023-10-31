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
    }
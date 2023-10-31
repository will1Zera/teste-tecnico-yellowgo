<?php

    class Ticket{
        public $id;
        public $users_id;
        public $title;
        public $protocol;
        public $type;
        public $description;
        public $responsable_id;
        public $closure_reason;

        // Function that generates protocol number
        public function generateProtocol(){
            $min = 10 ** 7;
            $max = 10 ** 8 - 1;
            $randomNumber = random_int($min, $max);
        
            // Formate o número para ter exatamente 8 dígitos preenchendo com zeros à esquerda
            $protocolNumber = str_pad($randomNumber, 8, '0', STR_PAD_LEFT);
        
            return $protocolNumber;
        }
        
    }
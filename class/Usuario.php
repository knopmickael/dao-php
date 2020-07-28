<?php

    class Usuario {

        private $user_id;
        private $user_login;
        private $user_senha;
    
        public function getUser_id(){
            return $this->user_id;
        }

        public function setUser_id($value){
            $this->user_id = $value;
        }

        public function getUser_login(){
            return $this->user_login;
        }

        public function setUser_login($value){
            $this->user_login = $value;
        }

        public function getUser_senha(){
            return $this->user_senha;
        }

        public function setUser_senha($value){
            $this->user_senha = $value;
        }

    }

?>
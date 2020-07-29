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

        public function carregarUsuario($id){
            
            $sql = new Sql();

            $resultado = $sql->select("SELECT * FROM users WHERE user_id = :ID", array(
                ":ID"=>$id
            ));

            if($resultado!=NULL){
                $linha = $resultado[0];
                $this->setUser_id($linha['user_id']);
                $this->setUser_login($linha['user_login']);
                $this->setUser_senha($linha['user_senha']);
            }

        }

        public function __toString() {
            return json_encode(array(
                $this->getUser_id(),
                $this->getUser_login(),
                $this->getUser_senha()
            ));
        }

    }

?>
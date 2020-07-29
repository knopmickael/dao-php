<?php

    class Usuario {

        // ATRIBUTOS...

        private $user_id;
        private $user_login;
        private $user_senha;
                 
        // GETTERS E SETTERS...

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

        // MÉTODOS...
        
        // Carrega um usuário através do user_id

        public function carregarUsuario($id){
            
            $sql = new Sql();

            $resultado = $sql->select("SELECT * FROM users WHERE user_id = :ID", array(
                ":ID"=>$id
            ));

            $this->carregarDados($resultado);

        }

        // Carrega uma lista com todos usuários do banco

        public static function getList(){
            
            $sql = new Sql();
            
            return json_encode($sql->select("SELECT * FROM users ORDER BY user_id DESC"));
            
        }

        // Realiza uma pesquisa de user_login registrados no banco
        
        public static function search($pesquisa){
            
            $sql = new Sql();
            
            return json_encode($sql->select("SELECT * FROM users WHERE user_login LIKE :VALUE", array(
                ":VALUE"=>"%".$pesquisa."%"
            )));
            
        }

        // Autentica um usuário registrado no banco

        public function logar($login, $senha){
            
            $sql = new Sql();
            
            $resultado = $sql->select("SELECT * FROM users WHERE user_login = :LOGIN AND user_senha = :PASSWORD", array(
                ":LOGIN"=>$login,
                ":PASSWORD"=>$senha
            ));
            
            $this->carregarDados($resultado);
            
        }

        // Seta os dados do usuário registrado no banco no objeto
        
        public function carregarDados($resultado){

            if($resultado!=NULL){
                $linha = $resultado[0];
                $this->setUser_id($linha['user_id']);
                $this->setUser_login($linha['user_login']);
                $this->setUser_senha($linha['user_senha']);
            } else {
                throw new Exception("ERRO - USUÁRIO NÃO ENCONTRADO.");
            }

        }

        // Insere um usuário no banco através duma Procedure

        public function inserirUsuario($login, $senha){

            $sql = new Sql();

            $retorno = $sql->select("CALL sp_insert_user (:LOGIN, :PASSWORD)", array(
                ":LOGIN"=>$login,
                ":PASSWORD"=>$senha
            ));

            $this->carregarDados($retorno);

        }

        // Atualiza um usuário do banco

        public function attUsuario($login, $senha){

            $sql = new Sql();

            $sql->query("UPDATE users SET user_login = :LOGIN, user_senha = :PASSWORD WHERE user_id = :ID",
            array(
                ":ID"=>$this->getUser_id(),
                ":LOGIN"=>$login,
                ":PASSWORD"=>$senha
            ));

        }

        // Exclui um usuário do banco

        public function deletarUsuario($id){

            $sql = new Sql();

            $this->carregarUsuario($id);

            $sql->query("DELETE FROM users WHERE user_id = :ID", array(
                ":ID"=>$id
            ));

            if($this->user_id){
                echo 'Usuário deletado.';
            }

        }

        // Função mágica que permite aplicar um echo no objeto

        public function __toString() {

            return json_encode(array(
                $this->getUser_id(),
                $this->getUser_login(),
                $this->getUser_senha()
            ));

        }
        
    }
    
?>
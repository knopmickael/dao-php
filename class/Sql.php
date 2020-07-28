<?php

    class Sql extends PDO {
        
        private $conn;

        public function __construct(){

            $this->conn = new PDO ("mysql:host=localhost;dbname=db_dao", "root", "");

        }

        public function query($query, $params = array()) {

            $stmt = $this->conn->prepare($query);

            foreach ($params as $chave => $valor) {

                $stmt->bindParam($chave, $valor);

            }

            $stmt->execute();

            return $stmt;

        }

        public function select($query, $params = array()):array{

            $stmt = $this->query($query, $params);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

    }

?>
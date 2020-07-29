<?php

    class Sql extends PDO {
        
        private $conn;

        public function __construct(){

            $this->conn = new PDO ("mysql:host=localhost;dbname=db_dao", "root", "");

        }

        private function setParams($statement, $parameters = array()) {
            foreach ($parameters as $key => $value) {
                $this->setParam($statement, $key, $value);
            }
        }

        private function setParam($statement, $key, $value) {
                $statement->bindParam($key, $value);
        }

        public function query($query, $params = array()){

            $stmt = $this->conn->prepare($query);

            $this->setParams($stmt, $params);

            $stmt->execute();

            return $stmt;

        }

        public function select($query, $params = array()):array{

            $stmt = $this->query($query, $params);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

    }

?>
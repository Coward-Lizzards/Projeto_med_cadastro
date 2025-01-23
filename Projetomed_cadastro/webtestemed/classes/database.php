<?php

class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "teste_cadastro_med";
    public $conn;


    //$mysqli = new mysqli($servername, $username, $password, $dbname);


    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Erro na conexão: " . $exception->getMessage());
        }

        return $this->conn;
    }
}
?>

<?php

class Usuario {
    private $conn;
    private $table_name = "usuarios";

    public $id_user;
    public $email;
    public $senha;

    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function cadastrar() {
        $query = "INSERT INTO " . $this->table_name . " (email, senha)
                  VALUES (:email, :senha)";
    
        $stmt = $this->conn->prepare($query);
    

        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);
    
        try {
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger' role='alert'>Erro ao cadastrar: " . $e->getMessage() . "</div>";
            
        }
    
        return false;
    }

    public function deletar($id_usuario) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_usuario = :id_usuario";

        $stmt = $this->conn->prepare($query);

        
        $stmt->bindParam(":id_usuario", $id_usuario);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger' role='alert'>Erro ao deletar: " . $e->getMessage() . "</div>";
            return false;
        }
    }
    
}
?>

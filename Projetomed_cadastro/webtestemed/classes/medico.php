<?php
require_once('utils.php');
require_once('usuario.php');

class Medico
{
    private $conn;
    private $table_name = "medicos";
    private $id_usuario;

    public $id_medico;
    public $nome;
    public $crm;
    public $telefone;
    public $id_especialidade;
    public $cep;
    public $endereco;



    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function cadastrar()
    {
        $query = "INSERT INTO " . $this->table_name . " (nome, crm, telefone, id_especialidade, cep, endereco, id_usuario)
                  VALUES (:nome, :crm, :telefone, :id_especialidade, :cep, :endereco, :id_usuario)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":crm", $this->crm);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":id_especialidade", $this->id_especialidade);
        $stmt->bindParam(":cep", $this->cep);
        $stmt->bindParam(":endereco", $this->endereco);
        $stmt->bindParam(':id_usuario', $_SESSION['user_id']);


        try {
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger' role='alert'>Erro ao cadastrar: " . $e->getMessage() . "</div>";
        }

        return false;
    }


    public function editar($id_usuario)
    {
        $query = "UPDATE " . $this->table_name . "
              SET nome = :nome,
                  telefone = :telefone,
                  id_especialidade = :id_especialidade,
                  cep = :cep,
                  endereco = :endereco
              WHERE id_usuario = :id_usuario";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":id_especialidade", $this->id_especialidade);
        $stmt->bindParam(":cep", $this->cep);
        $stmt->bindParam(":endereco", $this->endereco);
        $stmt->bindParam(":id_usuario", $id_usuario);
        //$stmt->bindParam(":id_medico", $this->id_medico);


        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger' role='alert'>Erro ao atualizar: " . $e->getMessage() . "</div>";
            return false;
        }
    }


    public function deletar($id_usuario) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_usuario = :id_usuario";

        $stmt = $this->conn->prepare($query);

        //$stmt->bindParam(":id_medico", $this->id_medico);
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
<!--try {
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger' role='alert'>Os dados informados já estão cadastrados.</div>";
        }
        return false;-->
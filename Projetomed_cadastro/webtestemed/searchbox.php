<div class="container mt-4">
    <h2>Resultados da Pesquisa</h2>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['search'])) {
        
        require_once 'classes/database.php';

        $search = $_GET['search'];
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT 
                medicos.nome AS medico_nome, 
                medicos.crm, 
                medicos.telefone, 
                medicos.endereco, 
                especialidades.nome_esp AS especialidade_nome
                FROM medicos
                INNER JOIN especialidades 
                ON medicos.id_especialidade = especialidades.id_especialidade
                WHERE medicos.nome LIKE :search 
                OR medicos.crm LIKE :search 
                OR especialidades.nome_esp LIKE :search
                ";
        $stmt = $db->prepare($query);


        $searchTerm = "%" . $search . "%";
        $stmt->bindParam(":search", $searchTerm, PDO::PARAM_STR);


        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            echo "<div class='row'>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='col-md-4 mb-3'>";
                echo "<div class='card text-bg-light'>";
                echo "<div class='card-header'><strong>" . htmlspecialchars($row['medico_nome']) . "</strong></div>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>CRM: " . htmlspecialchars($row['crm']) . "</h5>";
                echo "<p class='card-text'><strong>Especialidade:</strong> " . htmlspecialchars($row['especialidade_nome']) . "</p>";
                echo "<p class='card-text'><strong>Telefone:</strong> " . htmlspecialchars($row['telefone']) . "</p>";
                echo "<p class='card-text'><strong>Endereço:</strong> " . htmlspecialchars($row['endereco']) . "</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p class='text-danger'>Nenhum médico encontrado.</p>";
        }
    } else {
        echo "<p>Digite um nome para buscar.</p>";
    }
    ?>
</div>

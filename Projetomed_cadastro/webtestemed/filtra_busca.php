<?php
session_start()
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Cadastro Online</title>
</head>

<body>
    <?php
    include('header.php');
    ?>
    <div class="container my-4">
        <div class="card">
            <div class="card-header text-center">
                <h4>Especialidades</h4>
            </div>
            <div class="list-group">
                <?php

                require_once 'classes/database.php';
                $database = new Database();
                $db = $database->getConnection();

                // mesma coisa do select de pag cadastro
                $query = "SELECT * FROM especialidades";
                $stmt = $db->prepare($query);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<a href='resultado_busca.php?search=" . urlencode($row['nome_esp']) . "' 
                        class='list-group-item list-group-item-action fs-5 text-center'>"
                        . htmlspecialchars($row['nome_esp']) .
                        "</a>";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php
    include('footer.php');
    ?>
</body>

</html>
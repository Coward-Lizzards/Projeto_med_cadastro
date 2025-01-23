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
    require_once('classes/database.php');
    require_once('classes/usuario.php');
    require_once('classes/utils.php');

    $database = new Database();
    $db = $database->getConnection();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $errors = [];


        if (empty($errors)) {
            $usuario = new Usuario($db);


            //$medico->id_medico = $_POST['id_medico'];
            $id_usuario = $_SESSION['user_id'];

            if ($usuario->deletar($_SESSION['user_id'])) {
                echo "<div class='alert alert-success' role='alert'>Dados Deletados.</div>";
                session_unset();
                session_destroy();
                header("Location: index.php");
                exit;
            } else {
                echo "<div class='alert alert-danger' role='alert'>Erro ao Excluir Dados.</div>";
            }
        } else {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger' role='alert'>{$error}</div>";
            }
        }
    }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
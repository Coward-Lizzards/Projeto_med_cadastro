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

        $email = sanitizeInput($_POST['email'] ?? '');
        $senha = sanitizeInput($_POST['senha'] ?? '');

        $errors = [];


        if (!validateInput($email, 'email')) {
            $errors[] = "E-mail inválido.";
        }
        if (!validateInput($senha, 'senha')) {
            $errors[] = "Senha inválida.";
        }


        if (empty($errors)) {
            $usuario = new Usuario($db);
            $usuario->email = $email;
            $usuario->senha = $senha;


            if ($usuario->cadastrar()) {
                echo "<div class='alert alert-success' role='alert'>Usuario Cadastrado com Sucesso!</div>";
                header("Location: pag_cadastro.php");
            } else {
                echo "<div class='alert alert-danger' role='alert'>Erro ao Cadastrar Usuario.</div>";
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
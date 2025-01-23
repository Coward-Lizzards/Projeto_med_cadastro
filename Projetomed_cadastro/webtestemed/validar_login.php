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

    session_start();
    
    include('header.php');
    require_once('classes/database.php');
    require_once('classes/usuario.php');
    require_once('classes/utils.php');

    $database = new Database();
    $db = $database->getConnection();


    if (empty($_POST['email'])) {
        echo "Preencha seu e-mail";
    } else if (empty($_POST['senha'])) {
        echo "Preencha sua senha";
    } else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        
        $query = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR); 
        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_id'] = $user['id_usuario']; 
            $_SESSION['user_email'] = $user['email']; 

            

            echo "Login bem-sucedido!";

            header("Location: index.php"); 
            exit(); 
        } else {
            echo "E-mail ou senha inválidos.";
        }
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
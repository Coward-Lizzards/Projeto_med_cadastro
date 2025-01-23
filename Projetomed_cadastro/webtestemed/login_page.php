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
    <div class="container-fluid">
        <div class="row justify-content-center bg-success p-3">

            <h1 class="text-center text-light">Login</h1>
            <div class="justify-content-center min-vw-75" style="max-width: 50rem;">
                <form action="validar_login.php" method="POST">

                    <label for="email" class="text-light form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <br><br>
                    <label for="senha" class="text-light form-label">Password</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                    <a href="pag_cadastro_user.php" class="text-light">Não tem uma conta? Cadastre-se</a>
                    <br><br>
                    <button type="submit" class="btn btn-outline-light">Entrar</button>

            </div>
        </div>
        </form>
    </div>
    <?php
    include('footer.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
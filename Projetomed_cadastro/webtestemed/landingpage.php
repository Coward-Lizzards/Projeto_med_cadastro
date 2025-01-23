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
    <div class="container-fluid">
        <h1 class="text-center text-success">Lorem, ipsum dolor.</h1><br>
        <div class="row bg-success p-5 min-vh-80 d-flex justify-content-around p-2">
            <div class="col-lg-5 col-12 min-vw-80 mb-5">
                <h1 class="text-light">Faça parte do nosso time de Profissionais!</h1><br>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis explicabo, inventore obcaecati modi aperiam ipsum.</p>
                <form class="d-flex" method="get" action="pag_cadastro.php">
                    <button class="btn btn-outline-light" type="submit">Cadastre-se!</button>
                </form>
            </div>
            
            <div class="col-lg-5 col-12 min-vw-80">
                <h1 class="text-light">Encontrar Médicos</h1>
                <form class="d-flex" method="get" action="resultado_busca.php">
                    <input class="form-control me-2" type="text" name="search" placeholder="Digite o nome" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php
        include('temp.php');
    ?>
</body>

</html>
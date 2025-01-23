<?php
require_once('classes/database.php');
require_once('classes/utils.php');
$database = new Database();
$db = $database->getConnection();

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Cadastro Médico Online</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto ml-2 mb-2 mb-lg-0">
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="pag_cadastro_user.php">Novo Cadastro</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- Links visíveis apenas para usuários logados -->

                    <?php if (!verificarCadastroMedico($db, $_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="pag_cadastro.php">Cadastrar Médico</a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php">Meu Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Sair</a>
                    </li>
                <?php else: ?>
                    <!-- Links visíveis para visitantes -->
                    <li class="nav-item">
                        <a class="nav-link" href="login_page.php">Entrar</a>
                    </li>
                <?php endif; ?>
            </ul>
            <form class="d-flex" method="get" action="resultado_busca.php">
                <input class="form-control me-2" type="text" name="search" placeholder="Pesquisar" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
        </div>
    </div>
</nav>
<?php
require_once('classes/utils.php');
protegerPagina();
require_once('classes/database.php');

$database = new Database();
$db = $database->getConnection();

if (verificarCadastroMedico($db, $_SESSION['user_id'])) {
    header("Location: index.php"); 
    exit;  
}
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

            <h1 class="text-center text-light">Cadastro de Médicos</h1>
            <div class="justify-content-center min-vw-75" style="max-width: 50rem;">
                <form action="cadastro.php" method="POST">

                    <label for="nome" class="text-light form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                    <br><br>

                    <label for="crm" class="text-light form-label">CRM:</label>
                    <input type="text" class="form-control" id="crm" name="crm" required>
                    <br><br>

                    <label for="telefone" class="text-light form-label">Telefone:</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" required>
                    <br><br>

                    <!-- select especialidade -->
                    <label for="id_especialidade" class="text-light form-label">Especialidade:</label>
                    <select class="form-select" aria-label="Default select example" id="id_especialidade" name="id_especialidade" required>
                        <option value="">Selecione uma especialidade</option>
                        <?php
                        require_once 'classes/database.php';

                        $database = new Database();
                        $db = $database->getConnection();

                        $query = "SELECT * FROM especialidades";
                        $stmt = $db->prepare($query);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . $row['id_especialidade'] . "'>" . $row['nome_esp'] . "</option>";
                        }
                        ?>
                    </select>
                    <br><br>
                    <label for="cep" class="text-light form-label">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" maxlength="9" required>
                    <br><br>
                    <label for="endereco" class="text-light form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" readonly required>
                    <br><br>
                    <button type="submit" class="btn btn-outline-light">Cadastrar</button>

            </div>
        </div>

        <!-- literalmente o unico pedaco em js pq ´não consegui fazer o viacep funcionar-->
        <script>
            document.getElementById('cep').addEventListener('blur', async function() {
                const cep = this.value.replace(/\D/g, '');
                if (cep.length === 8) {
                    try {
                        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                        const data = await response.json();

                        if (!data.erro) {
                            document.getElementById('endereco').value = `${data.logradouro}, ${data.bairro}, ${data.localidade} - ${data.uf}`;
                        } else {
                            alert('CEP não encontrado.');
                            document.getElementById('endereco').value = '';
                        }
                    } catch (error) {
                        alert('Erro ao buscar o CEP. Verifique sua conexão.');
                    }
                } else {
                    alert('CEP inválido. Insira 8 números.');
                }
            });
        </script>



        </form>
    </div>
    </div>
    </div>
    <?php
    include('footer.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
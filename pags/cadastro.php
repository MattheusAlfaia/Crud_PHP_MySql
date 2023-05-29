<?php
if ($_POST) {
    require_once '../controllers/cadastroController.php';
    $cadastrar = new cadastraCurriculo();
    if(!isset($_POST['cursos'])){
        $_POST['cursos'] = '';
    }
    $cadastrar = $cadastrar->cadastrar($_POST['nome'], $_POST['email'], $_POST['login'], $_POST['senha'], $_POST['cpf'], $_POST['nascimento'], $_POST['sexo'], $_POST['estadoCivil'], $_POST['escolaridade'], $_POST['cursos'], $_POST['experienciaProfissional'], $_POST['salario']);
    if ($cadastrar) {
        $sucess = true;
    } else if ($cadastrar == false) {
        $sucess = false;
        $error = 'Informações já existentes';
    } else {
        $sucess = false;
        $error = 'Erro ao cadastrar!';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amais - Desafio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid-lg">
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="">Desafio Amais</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="./login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <?php if (isset($sucess) && $sucess) { ?>
            <div class="alert alert-success text-center mt-5" role="alert">
                <h4 class="alert-heading">Sucesso!</h4>
                <p>Cadastro concluído com êxito.</p>
                <hr>
                <p class="mb-0">Faça login para editar.</p><a href="./login.php" class="btn link-primary">Login</a>
            </div>
        <?php } else if (isset($sucess) && !$sucess) { ?>
            <div class="alert alert-danger text-center mt-5" role="alert">
                <h4 class="alert-heading">Erro!</h4>
                <p>
                    <?php echo $error; ?>
                </p>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h2>Cadastro de Currículo</h2>
            </div>
        </div>
    </div>
    <div class="mx-auto " style="max-width: 600px; margin-bottom: 200px;">
        <form id="Formulario" method="POST">
            <!-- Nome -->
            <div class="mb-3 mt-5">
                <label for="exampleFormControlInput1" class="form-label">Nome Completo</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome Completo" required>
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com" required>
            </div>
            <!-- Login -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Login</label>
                <input type="text" name="login" id="login" class="form-control" placeholder="Login" required>
            </div>
            <!-- Senha -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required>
            </div>
            <!-- Cpf -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">CPF</label>
                <input type="text" name="cpf" id="CPF" class="form-control" maxlength="14" placeholder="CPF" required>
            </div>
            <!-- data nascimento -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Data de Nascimento</label>
                <input type="date" name="nascimento" id="dataNasc" class="form-control" placeholder="Data de Nascimento" required>
            </div>
            <!-- sexo -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Sexo</label>
                <select class="form-select" name="sexo" id="Sexo" aria-label="Default select example" required>
                    <option selected>---Selecione---</option>
                    <option value="1">Masculino</option>
                    <option value="2">Feminino</option>
                    <option value="3">Outros</option>
                </select>
            </div>
            <!-- estado civil -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Estado Civil</label>
                <select class="form-select" name="estadoCivil" id="estadoCivil" aria-label="Default select example" required>
                    <option selected>---Selecione---</option>
                    <option value="1">Solteiro(a)</option>
                    <option value="2">Casado(a)</option>
                    <option value="3">Divorciado(a)</option>
                    <option value="4">Viúvo(a)</option>
                </select>
            </div>
            <!-- escolaridade -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Escolaridade</label>
                <select class="form-select" name="escolaridade" id="Escolaridade" aria-label="Default select example" required>
                    <option selected>---Selecione---</option>
                    <option value="1">Ensino Fundamental</option>
                    <option value="2">Ensino Médio</option>
                    <option value="3">Ensino Superior</option>
                    <option value="4">Pós-Graduação</option>
                    <option value="5">Mestrado</option>
                    <option value="6">Doutorado</option>
                </select>
            </div>
            <!-- Cursos -->
            <div class="mb-3" id="cursosContainer">
                <label for="cursoInput" class="form-label">Cursos / Especializações</label>
                <div class="input-group mb-2">
                    <input type="text" name="curso" class="form-control" id="cursoInput" placeholder="Digite o nome do curso">
                    <button class="btn btn-outline-secondary" type="button" id="addCursoBtn">Adicionar</button>
                </div>
            </div>
            <!-- Esperiencia Profissional -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Experiência Profissional</label>
                <textarea class="form-control" name="experienciaProfissional" id="experienciaProfissional" rows="3" placeholder="Digite sua experiência profissional"></textarea>
            </div>
            <!-- digite a Pretenção salarial -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Pretenção Salarial</label>
                <input type="text" name="salario" class="form-control" id="salario" placeholder="Digite a Pretenção Salarial" required>
            </div>
            <!-- botão salvar dados -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
    </div>

    <script src="./js/submitForm.js"></script>
    <script src="./js/validaInputs.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
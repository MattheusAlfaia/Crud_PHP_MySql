<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../index.php');
} else {
    $errorMsg = '';
    $successMsg = '';
    include '../controllers/atualizaCadastro.php';
    $atualiza = new atualizaCurriculo();
    $dadosUser = $atualiza->dadosUser($_SESSION['id'], $_SESSION['email']);
}
// submit apagar curriculo
if (isset($_POST['apagar'])) {
    $apagar = new atualizaCurriculo();
    $apagar = $apagar->apagarCurriculo($_SESSION['id']);
    if ($apagar) {
        session_destroy();
        header('Location: ../index.php');
    }
}
// submit atualizar curriculo
if (isset($_POST['enviar'])) {
    $atualizar = new atualizaCurriculo();
    $atualiza = $atualizar->atualizarCurriculo($_POST['nome'], $_POST['email'], $_POST['login'], $_POST['senha'], $_POST['cpf'], $_POST['nascimento'], $_POST['sexo'], $_POST['estadoCivil'], $_POST['escolaridade'], $_POST['cursos'], $_POST['experienciaProfissional'], $_POST['salario']);
    if ($atualiza) {
        $successMsg = 'A alteração foi realizada com sucesso.';
    } else {
        $errorMsg = 'Ocorreu um erro ao realizar a alteração.';
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
                <a class="navbar-brand text-light" href="../">Desafio Amais</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="./sair.php">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container-fluid-lg">
        <div class="mx-auto " style="max-width: 600px; margin-bottom: 200px;">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center">Atualizar Cadastro</h1>
                    </div>
                    <!-- mesagem de sucesso ateração -->
                    <?php if (!empty($errorMsg)) : ?>
                        <div class="alert alert-danger">
                            <?php echo $errorMsg; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($successMsg)) : ?>
                        <div class="alert alert-success">
                            <?php echo $successMsg; ?>
                        </div>
                    <?php endif; ?>
                    <!--  -->
                    <div class="col-12">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $dadosUser[0]->Nome; ?>" required>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $dadosUser[0]->Email; ?>" required>
                    </div>
                    <div class="col-12">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" class="form-control" id="login" name="login" value="<?php echo $dadosUser[0]->Login_User; ?>" required>
                    </div>
                    <div class="col-12">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $dadosUser[0]->Senha; ?>" required>
                    </div>
                    <div class="col-12">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $dadosUser[0]->CPF; ?>" required>
                    </div>
                    <div class="col-12">
                        <label for="nascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" id="nascimento" name="nascimento" value="<?php echo $dadosUser[0]->DataNascimento; ?>" required>
                    </div>
                    <!-- sexo -->
                    <div class="col-12">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select class="form-select" aria-label="Default select example" id="sexo" name="sexo" required>
                            <option value="1" <?php if ($dadosUser[0]->Sexo == '1') {
                                                    echo 'selected';
                                                } ?>>Masculino</option>
                            <option value="2" <?php if ($dadosUser[0]->Sexo == '2') {
                                                    echo 'selected';
                                                } ?>>Feminino</option>
                            <option value="3" <?php if ($dadosUser[0]->Sexo == '3') {
                                                    echo 'selected';
                                                } ?>>Outro</option>
                        </select>
                    </div>
                    <!-- estado civil -->
                    <div class="col-12">
                        <label for="estadoCivil" class="form-label">Estado Civil</label>
                        <select class="form-select" aria-label="Default select example" id="estadoCivil" name="estadoCivil" required>
                            <option value="1" <?php if ($dadosUser[0]->EstadoCivil == '1') {
                                                    echo 'selected';
                                                } ?>>Solteiro(a)</option>
                            <option value="2" <?php if ($dadosUser[0]->EstadoCivil == '2') {
                                                    echo 'selected';
                                                } ?>>Casado(a)</option>
                            <option value="3" <?php if ($dadosUser[0]->EstadoCivil == '3') {
                                                    echo 'selected';
                                                } ?>>Divorciado(a)</option>
                            <option value="4" <?php if ($dadosUser[0]->EstadoCivil == '4') {
                                                    echo 'selected';
                                                } ?>>Viúvo(a)</option>
                        </select>
                    </div>
                    <!-- escolaridade -->
                    <div class="col-12 mb-3">
                        <label for="escolaridade" class="form-label">Escolaridade</label>
                        <select class="form-select" aria-label="Default select example" id="escolaridade" name="escolaridade" required>
                            <option value="1" <?php if ($dadosUser[0]->Escolaridade == '1') {
                                                    echo 'selected';
                                                } ?>>Ensino Fundamental</option>
                            <option value="2" <?php if ($dadosUser[0]->Escolaridade == '2') {
                                                    echo 'selected';
                                                } ?>>Ensino Médio</option>
                            <option value="3" <?php if ($dadosUser[0]->Escolaridade == '3') {
                                                    echo 'selected';
                                                } ?>>Ensino Superior</option>
                            <option value="4" <?php if ($dadosUser[0]->Escolaridade == '4') {
                                                    echo 'selected';
                                                } ?>>Pós-Graduação</option>
                            <option value="5" <?php if ($dadosUser[0]->Escolaridade == '5') {
                                                    echo 'selected';
                                                } ?>>Mestrado</option>
                            <option value="6" <?php if ($dadosUser[0]->Escolaridade == '6') {
                                                    echo 'selected';
                                                } ?>>Doutorado</option>
                        </select>
                    </div>
                    <!-- cursos -->
                    <div class="col-12">
                        <div class="mb-3" id="cursosContainer">
                            <label for="cursoInput" class="form-label">Cursos / Especializações</label>
                            <div class="input-group mb-2">
                                <input type="text" name="curso" class="form-control" id="cursoInput" placeholder="Digite o nome do curso">
                                <button class="btn btn-outline-secondary" type="button" id="addCursoBtn">Adicionar</button>
                            </div>
                            <?php
                            $cursos = $dadosUser[0]->CursosEspecializacoes;
                            $cursos = explode(',', $cursos);
                            foreach ($cursos as $curso) {
                                echo '<div class="input-group mb-2">
                                <input type="text" name="cursos[]" class="form-control" value="' . $curso . '">
                                <button class="btn btn-outline-secondary remove-curso" type="button">Remover</button>
                                </div>';
                            }
                            ?>
                        </div>

                    </div>
                    <!-- ExperienciaProfissional -->
                    <div class="col-12">
                        <label for="experienciaProfissional" class="form-label">Experiência Profissional</label>
                        <input type="text" class="form-control" id="experienciaProfissional" name="experienciaProfissional" value="<?php echo $dadosUser[0]->ExperienciaProfissional; ?>">
                    </div>
                    <!-- PretensaoSalarial -->
                    <div class="col-12">
                        <label for="pretensaoSalarial" class="form-label">Pretensão Salarial</label>
                        <input type="text" class="form-control" name="salario" id="salario" name="pretensaoSalarial" value="<?php echo $dadosUser[0]->PretensaoSalarial; ?>" required>
                    </div>
                </div>
                <!-- apagar tudo -->
                <div class="d-grid gap-2 mt-4 mb-5">
                    <button type="submit" class="btn btn-danger" name="apagar" value="apagar">Apagar Currículo</button>
                </div>
                <!-- botao -->
                <div class="d-grid gap-2 mb-5">
                    <button type="submit" class="btn btn-primary" name="enviar" value="enviar">Salvar</button>
                </div>
        </div>
        </form>
    </div>

    <script src="./js/atualizaCadastro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
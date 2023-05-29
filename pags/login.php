<?php
include_once '../controllers/LoginController.php';
$errorMsg = '';
if (isset($_POST['login'])) {
    $login = new LoginController();
    $login = $login->login($_POST);
    if ($login == false) {
        $errorMsg = 'Usuário ou senha incorretos!';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>

<body>
    <div class="container-fluid-lg">
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="../index.php">Desafio Amais</a>
            </div>
        </nav>
    </div>
    <div class="container">
        <?php if (!empty($errorMsg)) : ?>
            <div class="mt-3 alert alert-danger text-center">
                <?php echo $errorMsg; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="login-form">
        <form action="" method="POST">
            <h2 class="text-center">Login</h2>
            <div class="form-group">
                <input type="text" name="login" class="form-control" placeholder="Nome de Usuário" required="required">
            </div>
            <div class="form-group">
                <input type="password" name="senha" class="form-control" placeholder="Senha" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </div>
        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
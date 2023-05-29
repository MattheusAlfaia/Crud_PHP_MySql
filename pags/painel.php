<?php
session_start();
if (!isset($_SESSION['id'])) {
  echo "Não existe login!";
  exit;
} else {
  include '../controllers/painelController.php';
  $painel = new painelController();
  $listarCurriculos = $painel->listarCurriculos();
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
  <link rel="stylesheet" type="text/css" href="./css/table.css">
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
  <div class="container">
    <h1 class="text-center">Listagem de Currículos</h1>

    <table class="tabela">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Pretensão Salarial</th>
        </tr>
      </thead>
      <tbody>
        <?php $media = (float)$listarCurriculos[2]; ?>
        <?php if ($listarCurriculos[0]) {
          foreach ($listarCurriculos[0] as $curriculo) {
        ?>
            <?php $salario = (float)$curriculo->PretensaoSalarial; ?>
            <?php $salario = str_replace('.', '', $salario);
            $salario = str_replace(',', '.', $salario);
            $salario = number_format($salario, 2, ',', '.');
            ?>
            <tr <?php if ($salario >= $media) { ?> class="list-loss" <?php } else { ?> class="list-ok" <?php } ?>>
              <td><?php echo $curriculo->Nome; ?></td>
              <td>R$ <?php echo $curriculo->PretensaoSalarial; ?></td>
            </tr>
        <?php }
        } ?>
      </tbody>
    </table>

    <div class="alert alert-info mt-3" role="alert">
      Média Salarial: R$ <?php
                            $media = number_format($media, 2, ',', '.'); 
                            echo $media;
                          ?>
    </div>
    <div class="alert alert-success" role="alert">
      Soma Total: R$ <?php
                      $valor = $listarCurriculos[1];
                      $valor = str_replace('.', '', $valor);
                      $valor = str_replace(',', '.', $valor);
                      $valor = number_format($valor, 2, ',', '.');
                      echo $valor;
                      ?>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
<?php include_once("conexao.php");
$id_curso = $_GET['id_curso'];
$result_cursos = "SELECT * FROM produtos WHERE id='$id_curso'";
$resultado_cursos = mysqli_query($conexao, $result_cursos);
$row_cursos = mysqli_fetch_assoc($resultado_cursos);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Produto - <?php echo $row_cursos['NOME']; ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

</head>
<ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" href="index.php">TecNova - Ecommerce Digital</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="inicial.php">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="listadeprodutos.php">Listas de produtos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="carrinho.php">Carrinho</a>
  </li>
</ul>

<body>

  <div class="container theme-showcase" role="main">

    <form method="POST" action="editar.php" enctype="multipart/form-data">
      <div class="form-group" hidden>
        <label for="exampleInputEmail1">Id</label>
        <input type="text" class="form-control" name="idproduto" id="idproduto" value="<?php echo $row_cursos['ID']; ?>" >
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $row_cursos['NOME']; ?>" placeholder="Ex: Notebook">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Descrição</label>
        <input type="text" class="form-control" name="descricao" value="<?php echo $row_cursos['DESCRICAO']; ?>" id="descricao" placeholder="Ex: i5, 16gb de tam">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Valor</label>
        <input type="text" class="form-control" name="valor" id="valor" value="<?php echo $row_cursos['VALOR']; ?>" placeholder="100.00">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Valor</label>
        <br>
        <input type="file" name="pic" accept="image/*" />
      </div>


      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

  </div>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
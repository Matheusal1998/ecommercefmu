<?php include_once("conexao.php");
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Selecionar todos os cursos da tabela
$result_curso = "SELECT * FROM categoria";
$resultado_curso = mysqli_query($conexao, $result_curso);

//Contar o total de cursos
$total_cursos = mysqli_num_rows($resultado_curso);

//Seta a quantidade de cursos por pagina
$quantidade_pg = 6;

//calcular o número de pagina necessárias para apresentar os cursos
$num_pagina = ceil($total_cursos/$quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Selecionar os cursos a serem apresentado na página
$result_cursos = "SELECT * FROM categoria limit $incio, $quantidade_pg";
$resultado_cursos = mysqli_query($conexao, $result_cursos);
$total_cursos = mysqli_num_rows($resultado_cursos);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
        <title>lOJA VIRTUAL</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    </head>
    <body>
 
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
<div class="form-produto">
<form method="POST" action="cadastroP.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome"  placeholder="Ex: Notebook" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descrição</label>
    <input type="text" class="form-control"name="descricao" id="descricao"  placeholder="Ex: i5, 16gb de tam" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Valor</label>
    <input type="text" class="form-control" name="valor" id="valor" placeholder="100.00" required>
  </div>
  <div class="form-group">
    <label for="imagem">Imagem:</label><input type="file" name="pic" accept="image/*" required/>
  </div>
  <select id="categoria" name="categoria">
  <?php while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)) { ?>
          <option value="<?php echo $rows_cursos['ID'];?>"> <?php echo $rows_cursos['NOME'];?></option>  
							
								           
    <?php } ?>
  </select>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
</div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
    </body>        
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
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Produto - <?php echo $row_cursos['NOME']; ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script>
		$(function() {
			$("#header").load("header.html");
			$("#footer").load("footer.html");
		});
	</script>
</head>
<div id="header"></div>
<body>
	<div class="container theme-showcase" role="main">



		<div class="row">

			<div class="col-md-8">
				<img src="imagens/<?php echo $row_cursos['IMG']; ?>" width="100%" height="500px" />

			</div>
			<div class="col-md-4" style="margin-top: 20%;">
				<h1 class="titulo"><?php echo $row_cursos['NOME']; ?></h1>

				<h3 class="descricao"><?php echo $row_cursos['DESCRICAO']; ?></h3>

				<h4 class="valor"> R$ <?php echo number_format($row_cursos['VALOR'], 2, ",", ".") ?></h4>

				<a href="carrinho.php?add=carrinho&id=<?php echo  $row_cursos['ID'];; ?>">Adicionar no carrinho</a>
			</div>

		</div>

	</div>
	<div id="footer"></div>




	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
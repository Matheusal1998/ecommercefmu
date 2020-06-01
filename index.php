<?php include_once("conexao.php");
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Selecionar todos os cursos da tabela
$result_curso = "SELECT * FROM produtos";
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
$result_cursos = "SELECT * FROM produtos limit $incio, $quantidade_pg";
$resultado_cursos = mysqli_query($conexao, $result_cursos);
$total_cursos = mysqli_num_rows($resultado_cursos);
?>
<!DOCTYPE html>
<html lang="pt-br">
     <head>
        <title>LOJA VIRTUAL</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script>
			
      $(function() {
         $("#header").load("header.php");
         $("#footer").load("footer.html");
      });
   </script>
    </head>
    <body>
	<div id="header"></div>
        <div class="container theme-showcase" role="main">
		
		
            <div class="row">
                <?php while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)) { ?>
                        <div class="col-sm-4 col-md-3">
                            <div class="thumbnail">
                                <img src="imagens/<?php echo $rows_cursos['IMG']; ?>" alt="..." class="imagem_produto" width="100%" height="300px"> 
                                <div class="caption text-center ">
                                    <a href="detalhes.php?id_curso=<?php echo $rows_cursos['ID']; ?>">
									<h3 class="titulo-principal"><?php echo $rows_cursos['NOME'];?></h3>
									<p> R$ <?php echo number_format($rows_cursos['VALOR'],2,",",".");?></p>
									</a>
                                    <p><a href="carrinho.php?add=carrinho&id=<?php echo $rows_cursos['ID']; ?>" class="btn btn-primary" role="button">Comprar</a></p>
                                </div>
                            </div>
                        </div>                
                <?php } ?>
                <?php
				//Verificar a pagina anterior e posterior
				$pagina_anterior = $pagina - 1;
				$pagina_posterior = $pagina + 1;
			?>
			<nav class="text-center paginacao">
				<ul class="pagination">
					<li >
						<?php
						if($pagina_anterior != 0){ ?>
							<a href="index.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous" >
								<span aria-hidden="true">&laquo;</span>
							</a>
						<?php }else{ ?>
							<span aria-hidden="true">&laquo;</span>
					<?php }  ?>
					</li>
					<?php 
					//Apresentar a paginacao
					for($i = 1; $i < $num_pagina + 1; $i++){ ?>
						<li><a href="index.php?pagina=<?php echo $i; ?>" class="paginationul"><?php echo $i; ?> </a></li>
					<?php } ?>
					<li>
						<?php
						if($pagina_posterior <= $num_pagina){ ?>
							<a href="index.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
								<span aria-hidden="true">&raquo;</span>
							</a>
						<?php }else{ ?>
							<span aria-hidden="true">&raquo;</span>
					<?php }  ?>
					</li>
				</ul>
			</nav>

            </div>    
		</div> 
		<!-- Footer -->
		<div id="footer"></div>
<!-- Footer -->       
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
    </body>        
<?php include_once("conexao.php");
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

//Selecionar todos os cursos da tabela
$result_curso = "SELECT * FROM produtos";
$resultado_curso = mysqli_query($conexao, $result_curso);

//Contar o total de cursos
$total_cursos = mysqli_num_rows($resultado_curso);

//Seta a quantidade de cursos por pagina
$quantidade_pg = 6;

//calcular o número de pagina necessárias para apresentar os cursos
$num_pagina = ceil($total_cursos / $quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg * $pagina) - $quantidade_pg;

//Selecionar os cursos a serem apresentado na página
$result_cursos = "SELECT * FROM produtos limit $incio, $quantidade_pg";
$resultado_cursos = mysqli_query($conexao, $result_cursos);
$total_cursos = mysqli_num_rows($resultado_cursos);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>lOJA VIRTUAL</title>
  <link src="css/estilo.css" rel="stylesheet">
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

<body>
  <div id="header"></div>
  <div class="container theme-showcase" role="main">
    <div class="page-header">
      <br />
      <br />
      <label>Procurar por nome: </label>
      <input type="text" name="filtro" id="filtrar-tabela" class="filtro" />
    </div>
    <table class="table ">
    

      <thead>
        <tr>

          <th scope="col">ID</th>
          <th scope="col">NOME</th>
          <th scope="col">VALOR</th>
          <th scope="col"> </th>
          <th scope="col"> </th>
        </tr>
      </thead>
      <tbody>


        <?php while ($rows_cursos = mysqli_fetch_assoc($resultado_cursos)) { ?>
          <tr class="produto">
            <td><?php echo $rows_cursos['ID']; ?></td>
            <td class="info-nome"><?php echo $rows_cursos['NOME']; ?></td>
            <td><?php echo 'R$ ' . number_format($rows_cursos['VALOR'], 2, ",", "."); ?></td>
            <td><a href="editarproduto.php?id_curso=<?php echo $rows_cursos['ID']; ?>">Editar</a> </td>
            <td><a href="excluirproduto.php?id_curso=<?php echo $rows_cursos['ID']; ?>">Excluir</a> </td>

          </tr>
        <?php } ?>


      </tbody>
    </table>
    <a href="cadastroProduto.php">Cadastrar novo produto</a>
    <div class="row">


    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <div id="footer"></div>
</body>
<script>
  var campoFiltro = document.querySelector("#filtrar-tabela");
  campoFiltro.addEventListener("input", function() {
    console.log(this.value);
    var produtos = document.querySelectorAll(".produto");
    console.log(produtos);
    if (this.value.length > 0) {
      for (var i = 0; i < produtos.length; i++) {
        var produto = produtos[i];
        var tdNome = produto.querySelector(".info-nome");
        var nome = tdNome.textContent;
        var exepressao = new RegExp(this.value, "i");
        if (!exepressao.test(nome)) {
          produto.classList.add("invisivel");
        } else {
          produto.classList.remove("invisivel");
        }
      }
    } else {
      for (var i = 0; i < produtos.length; i++) {
        var produto = produtos[i];
        var tdNome = produto.querySelector(".info-nome");
        var nome = tdNome.textContent;
        produto.classList.remove("invisivel");

      }
    }
  });
</script>
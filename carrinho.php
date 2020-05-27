<?php include_once("conexao.php");
session_start();
if (!isset($_SESSION['itens'])) {

   $_SESSION['itens'] = array();
}
if (isset($_GET['add']) && $_GET['add'] == "carrinho") {
   $idproduto = $_GET['id'];

   if (!isset($_SESSION['itens'][$idproduto])) {
      $_SESSION['itens'][$idproduto] = 1;
   } else {
      $_SESSION['itens'][$idproduto] += 1;
   }
}

if (count($_SESSION['itens']) == 0) {
   
   echo 'Carrinho vazio';
   
}

?>
<html lang="pt-br">

<head>
   <title>lOJA VIRTUAL</title>
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
   <main>
      <div class="container" style="margin-top:20px;">
         <h4>Seu carrinho: </h4>
         <?php include_once("conexao.php");


         $valorTotal = 0;

         foreach ($_SESSION['itens'] as $idproduto => $quantidade) {
            $result_cursos = "SELECT * FROM produtos WHERE id='$idproduto'";
            $resultado_cursos = mysqli_query($conexao, $result_cursos);
            $row_cursos = mysqli_fetch_assoc($resultado_cursos);
            if ($row_cursos != null) {
               $total =  $row_cursos['VALOR'] * $quantidade;
               $valorTotal +=  $total;
               echo '<div class="carinnho"><img src="imagens/' . $row_cursos['IMG'] . '" alt="..." class="imagem_produto" width="80px" height="80px">' .
                  '<div class="produto_carrinho"><h3 class="titulo_carrinho">' . $row_cursos['NOME'] . '</h3>' .
                  '<h3 class="sub-titulo_carrinho"> Valor da unidade: R$' . number_format($row_cursos['VALOR'], 2, ",", ".") . '</h3>' .
                  '<h3 class="sub-titulo_carrinho"> Quantidade:' . $quantidade . '<br></h3>' .
                  '<h3 class="sub-titulo_carrinho"> Valor Total do produto = R$ ' . number_format($total, 2, ",", ".") . '<br/></h3>' .
                  '<a class="btn-remover" href="remover.php?remover=carrinho&id=' . $idproduto . '"> Remover</a><br/></div></div>';
            }
         }
         echo '<br/><div><div><h3 class="valorTotal">  Valor Total: ' . number_format($valorTotal, 2, ",", ".") . '</h3><br/><br/></div>';

         ?>
         <div style="float: right;">
            <!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
            <form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
               <!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
               <input type="hidden" name="code" value="7DC0CD632222B23664086F9E5B8F90C9" />
               <input type="hidden" name="iot" value="button" />
               <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
            </form>
            <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
         </div>

         <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->



   </main>
  
      <div id="footer"></div>
   
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <!-- Include all compiled plugins (below), or include individual files as needed -->
   <script src="js/bootstrap.min.js"></script>

</body>
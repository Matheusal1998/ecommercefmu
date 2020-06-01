<!DOCTYPE html>
<html lang="pt-br">


<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
		
	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&amp;display=swap" rel="stylesheet">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/ae073d9bf7.js" crossorigin="anonymous"></script><link href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css" media="all" rel="stylesheet"><link href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css" media="all" rel="stylesheet"><link href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all" rel="stylesheet">
</head>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="img/ImagemLogo2.png" width="30" height="30" class="d-inline-block align-top" alt="">
      Bootstrap
    </a>
    <?php include_once("conexao.php");
           session_start();
       if (isset($_SESSION['nome'])) {

         echo '<h6> Bem vindo, '. $_SESSION['nome'].  '</h6>';
       }

       ?>
  </nav>
<ul class="nav justify-content-end">
    <li class="nav-item">
        <a class="nav-link" href="carrinho.php"><i class="fas fa-shopping-cart"></i></a>
    </li>
    <li class="nav-item">
    <?php include_once("conexao.php");
     
            if (isset($_SESSION['nome'])) {

            echo '<a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>';
            }
            else{
                echo '<a class="nav-link" href="inicial_login.php"><i class="fas fa-user"></i></a>';
            }

            ?>
     
    </li>
</ul>
<img src="imagens/tv02-vem.webp" width="100%" />
<ul class=" nav categoria" >
    <li class="nav-item">
        <a class="nav-link active" href="produtosPorCategoria.php?id_categoria=1">Notebook</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="produtosPorCategoria.php?id_categoria=2">Celulares</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="produtosPorCategoria.php?id_categoria=3">Drones</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="produtosPorCategoria.php?id_categoria=4">Câmeras</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="produtosPorCategoria.php?id_categoria=5">Video-game</a>
    </li>
</li>
<li class="nav-item">
    <a class="nav-link" href="produtosPorCategoria.php?id_categoria=6">Televisores</a>
</li>
</ul>

<br>
<br>

</html>
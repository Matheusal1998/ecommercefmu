<?php 
include_once("conexao.php");

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$descricao = $_POST['descricao'];
$idcategoria = $_POST['categoria'];
$imagem = $_FILES["pic"];





if(isset($_FILES['pic']))
{
   $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
   $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
   $dir = 'imagens/'; //Diretório para uploads 
   move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
   echo("Imagem enviada com sucesso!");
} 

$result_cursos = "insert into produtos (NOME,VALOR,DESCRICAO,IMG, IDCATEGORIA) values ('$nome','$valor','$descricao','$new_name','$idcategoria')";
mysqli_query($conexao, $result_cursos);

//echo '<meta HTTP-EQUIV="REFRESH" CONTENT="0; URL=listadeprodutos.php"/>';
echo '<meta HTTP-EQUIV="REFRESH" CONTENT="0; URL=listadeprodutos.php"/>';
?>
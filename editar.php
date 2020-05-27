<?php 
include_once("conexao.php");

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$imagem = $_FILES["pic"];
$id_produto = $_POST['idproduto'];


echo $nome. '  '. $descricao. '  '.$valor;


if(isset($_FILES['pic']))
{
   $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
   $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
   $dir = 'imagens/'; //Diretório para uploads 
   move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
   echo("Imagen enviada com sucesso!");
   $result_cursos = "UPDATE produtos SET NOME = '".$nome."', VALOR = '".$valor."', DESCRICAO = '".$descricao."' WHERE ID = ".$id_produto.";";} 
else{
    $result_cursos = "UPDATE produtos SET NOME = '".$nome."', VALOR = '".$valor."', DESCRICAO = '".$descricao."' WHERE ID = ".$id_produto.";";
}
echo $result_cursos;
mysqli_query($conexao, $result_cursos);
echo '<meta HTTP-EQUIV="REFRESH" CONTENT="0; URL=listadeprodutos.php"/>';

?>
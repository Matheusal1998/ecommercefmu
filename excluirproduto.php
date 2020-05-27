<?php 
include_once("conexao.php");
 $id_produto = $_GET['id_curso'];
 $result_cursos = "delete from produtos where ID = ".$id_produto.";";


mysqli_query($conexao, $result_cursos);
echo '<meta HTTP-EQUIV="REFRESH" CONTENT="0; URL=listadeprodutos.php"/>';

?>
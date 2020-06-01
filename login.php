<?php
session_start();
include('conexao.php');
 
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}
 
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
 
$query = "select Usuario, perfil,Id_usuario, Nome from Usuarios where Usuario = '{$usuario}' and Senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);
 
$row = mysqli_num_rows($result);
$resultado_perfil = mysqli_query($conexao, $query);
$perfil = mysqli_fetch_assoc($resultado_perfil);

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	$_SESSION['nome'] = $perfil['Nome'];
	if( $perfil['perfil'] == '1'){
		header('Location: listadeprodutos.php');
		
	}
	else{
		header('Location: index.php');
	}
	
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: inicial_login.php');
	exit();
}
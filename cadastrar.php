<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$usuario = mysqli_real_escape_string($conexao,trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "SELECT COUNT(*) AS total FROM USUARIOS WHERE USUARIO =  '$usuario'";
$result = mysqli_query($conexao,$sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] >=1) {
    $_SESSION['existe'] = TRUE;
    header('Location: cadastro.php');
    exit;
}

$sql = "INSERT INTO USUARIOS (nome, usuario, senha, data) VALUES ('$nome', '$usuario','$senha', NOW())";

if($conexao->query($sql) === TRUE) {
   $_SESSION['cadastrado'] = TRUE;
}

$conexao->close();

header('location: cadastro.php');
exit;
?>
<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$usuario = mysqli_real_escape_string($conexao,trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "SELECT COUNT(*) AS total FROM Usuarios WHERE Usuario=  '$usuario'";
$result = mysqli_query($conexao,$sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] >=1) {
    $_SESSION['existe'] = TRUE;
    echo 'entrou';
    exit;
}

$sql = "INSERT INTO Usuarios (nome, usuario, senha, data) VALUES ('$nome', '$usuario','$senha', NOW())";
echo $sql;
if($conexao->query($sql) === TRUE) {
   $_SESSION['cadastrado'] = TRUE;
}

$conexao->close();


header('location: cadastro.php');
exit;
?>
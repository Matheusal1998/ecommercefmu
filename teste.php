<?php
session_start();
include('conexao.php');
?>

<!doctype HTML>
<html>
<head>
<title> Login </title>
</head>
<body>
<input required name="usuario" name="text" class="input is-large" placeholder="Usuário" autofocus=""><br>
<input required name="senha" class="input is-large" type="password" placeholder="Senha">
<button type="submit">
</body>
</html>
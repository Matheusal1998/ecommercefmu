<?php
define('HOST', 'mysql669.umbler.com:41890');
define('USUARIO', 'rooteccomercefmu');
define('SENHA', '09931040Mj');
define('DB', 'fmuecommerce');
 
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
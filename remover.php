<?php include_once("conexao.php");

    session_start();

   

    if(isset($_GET['remover']) && $_GET['remover'] == "carrinho")
    {
        $id_produto = $_GET['id'];
        unset($_SESSION['itens'][$id_produto]);
        echo "entrou";
        echo '<meta HTTP-EQUIV="REFRESH" CONTENT="0; URL=carrinho.php"/>';
    }
?>

<?php 
    require("connection.php");
    $id = filter_input (INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT); // pegando o valor do id e filtrando
    if ($id){
        $sql = $conexao -> prepare("DELETE FROM tarefas WHERE id = :id");
        $sql -> bindValue(":id", $id);
        $sql -> execute(); // executando a query
    }
    header("Location: ../index.php");
    exit;
?>
<?php
    require("connection.php");
    $id = filter_input (INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT); // pegando o valor do id e filtrando
    if ($id){
        $sql = $conexao -> prepare("SELECT feito FROM tarefas WHERE id = :id");
        $sql -> bindValue(":id", $id);
        $sql -> execute(); // executando a query
        if ($sql -> rowCount() > 0) { // se a quantidade de linhas for maior que 0
            $feito = $sql -> fetchAll(PDO::FETCH_ASSOC); // fetchAll() retorna todas as linhas da query
            if ($feito[0]['feito'] == 0){
                $sql = $conexao -> prepare("UPDATE tarefas SET feito = 1 WHERE id = :id");
                $sql -> bindValue(":id", $id);
                $sql -> execute(); // executando a query 
            }else{
                $sql = $conexao -> prepare("UPDATE tarefas SET feito = 0 WHERE id = :id");
                $sql -> bindValue(":id", $id);
                $sql -> execute(); // executando a query 
            }
        } else {
            $feito = [];
        } 
    }
    header("Location: ../index.php");
    exit;
?>
<?php 
    require("connection.php");
    $id = filter_input (INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT); // pegando o valor do titulo e filtrando
    $title = filter_input (INPUT_GET, "title", FILTER_SANITIZE_STRING); // pegando o valor do titulo e filtrando
    $task = filter_input (INPUT_GET, "task", FILTER_SANITIZE_STRING); // pegando o valor do input e filtrando
    $sql = $conexao -> prepare("UPDATE tarefas SET titulo = :titulo, descricao = :descricao WHERE id = :id");
    $sql -> bindValue(":titulo", $title);
    $sql -> bindValue(":descricao", $task);
    $sql -> bindValue(":id", $id);
    $sql -> execute(); // executando a query
    header("Location: ../index.php");
    exit;
?>
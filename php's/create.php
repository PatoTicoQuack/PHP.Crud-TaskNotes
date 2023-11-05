<?php 
    require("connection.php");
    $title = filter_input (INPUT_GET, "title", FILTER_SANITIZE_STRING); // pegando o valor do titulo e filtrando
    $task = filter_input (INPUT_GET, "task", FILTER_SANITIZE_STRING); // pegando o valor do input e filtrando
    $sql = $conexao -> prepare("INSERT INTO tarefas (titulo, descricao) VALUES (:titulo, :descricao)");
    $sql -> bindValue(":titulo", $title);
    $sql -> bindValue(":descricao", $task);
    $sql -> execute(); // executando a query
    header("Location: ../index.php");
    exit;
?>
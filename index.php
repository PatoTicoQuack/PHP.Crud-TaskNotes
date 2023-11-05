<?php 
    require "php's/connection.php"; // requerindo conexão com o banco de dados
    $sql = $conexao -> prepare("SELECT * FROM tarefas"); 
    $sql -> execute(); // executando a query
    if ($sql -> rowCount() > 0) { // se a quantidade de linhas for maior que 0
        $tarefas = $sql -> fetchAll(); // fetchAll() retorna todas as linhas da query
    } else {
        $tarefas = [];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="miniImagem/miniImagem.png">
</head>
<body data-bs-theme="dark">
    <form>
        <div class="form-group">
            <div class="botoes"> <!-- input text, botão de submit-->
                <div class="input-group mb-3" style="width: 1910px; padding-top: 10px; padding-left: 10px;">
                    <input type="text" autocomplete="off" class="form-control" id="notetext" placeholder="Faça sua anotação" aria-label="Faça sua anotação" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#titleModal">Anotar</button>
                </div>
            </div>
        </div>
    </form>
    <div class="tasks">
        <?php foreach($tarefas as $tarefa): ?> <!-- para cada tarefa, criar um card nesse loop -->
            <div class="card" style="width: 18rem; margin: 1rem; background-color: #343a40;">
                <div class="card-body">
                    <div class="card-upper-part" style="height: 32px;"> <!-- parte superior do card, com o título e o dropdown das opcoes-->
                        <h5 class="card-title"><?= $tarefa["titulo"] ?></h5>
                        <div class="dropdown">
                            <i class="bi bi-three-dots-vertical" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-id="<?=$tarefa["id"]?>" data-bs-target="#updateModal" href="#">Modificar</a></li>
                                <li><a class="dropdown-item" href="php's/conclude.php?id=<?=$tarefa["id"]?>"><?= $tarefa["feito"] == 0 ? "Concluir" : "Recomeçar"?></a></li>
                                <li><a class="dropdown-item" href="php's/delete.php?id=<?=$tarefa["id"]?>">Remover</a></li>
                            </ul>
                        </div>
                    </div>
                    <p class="card-text description"><?= $tarefa["descricao"] ?></p> <!-- descrição da tarefa -->
                    <div class="ExpandirAndBarra"> <!-- botão de expandir e barra de progresso -->
                        <div>
                            <a data-bs-toggle="modal" data-bs-target="#taskModal<?=$tarefa["id"]?>" class="btn btn-primary">Expandir</a>
                        </div>
                        <div class="progress" style="width: 150px; background-color: #272B2F;">
                            <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: <?=$tarefa["feito"]==0 ?"50%":"100%" ?>; background-color: <?=$tarefa["feito"]==0 ?"#FFC107":"#32CD32" ?>;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="taskModal<?=$tarefa["id"]?>" tabindex="-1" role="dialog"> <!-- modal de expandir -->
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class=""><?= $tarefa["titulo"] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="word-wrap: break-word;"><?php echo $tarefa["descricao"]?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="FecharExpandir" data-bs-dismiss="modal">Fechar</button>
                    </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="modal fade" id="titleModal" tabindex="-1" role="dialog"> <!-- modal de adicionar título -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deseja por um título?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <input type="text" placeholder="Digite aqui" class="form-control" id="taskTitle">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addTask">Anotar</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog"> <!-- modal de modificar -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <input type="text" placeholder="Digite aqui seu novo título" class="form-control" id="updateTaskTitle">
                <input type="text" placeholder="Digite aqui a nova descrição" class="form-control" id="updateTaskDescription">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="updateTaskBttn">Atualizar</button>
            </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
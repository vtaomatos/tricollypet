<?php
require_once "check_logado.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF8-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Cadastro de usuários - Tricolly Pet</title>
        
        <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <?php
            require_once "menu.php";
        ?>
        <div class="container" id="conteiner-geral">
            <h1>Tricollypet - Cadastro de usuário</h1>

            <form method="POST" action="CRUD.php" class="formulario container">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="" name="nome">
                </div>
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" id="login" placeholder="" name="login">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="text" class="form-control" id="senha" placeholder="" name="senha">
                </div>
                <div class="form-group">
                    <label for="confirma-senha">Confirme a Senha</label>
                    <input type="text" class="form-control" onspaste="return false;" id="confirma-senha" placeholder="" name="confirma_senha">
                </div>
            </form>
        </div>
    </body>
</html>

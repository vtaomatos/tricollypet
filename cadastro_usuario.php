<?php
require_once "check_logado.php";
require_once "menu.php";
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
            menu("usuario");
        ?>
        <div class="container" id="conteiner-geral">
            <h1>Tricollypet - Cadastro de usuário</h1>
            <?php
                if (!empty($_GET['msg'])) { ?>
                <br clear="both">
                <div class="text-center alert alert-<?php echo (!empty($_GET['success'])) ? "success" : "danger"?>"><?php echo $_GET['msg']; ?></div> 
            <?php
                }
                $_GET['msg'] = "";
            ?>

            <form method="POST" action="CRUD.php" class="form-cadastro-usuario formulario container">
                <div class="form-group">
                    <label for="nome_usuario">Nome</label>
                    <input type="text" class="form-control" id="nomnome_usuarioe" placeholder="" name="nome_usuario">
                </div>
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" id="login" placeholder="" name="login">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="" name="senha">
                </div>
                <div class="form-group">
                    <label for="confirma-senha">Confirme a Senha</label>
                    <input type="password" class="form-control" onspaste="return false;" id="confirma-senha" placeholder="" name="confirma_senha">
                </div>
                <div class="form-group">
                <input type="hidden" class="form-control" placeholder="" name="cadastrar_usuario" value="1">
                </div>
                <div id="div-cadastrar" class="form-group">
                    <input type="submit" id="cadastrar" value="Cadastrar" class="btn btn-info">
                </div>
            </form>
        </div>
    </body>
</html>

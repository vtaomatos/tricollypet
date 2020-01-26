<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-br" class="html-tela">
    <head>
        <meta charset="utf-8"/>
        <title>Login Tricollypet Gestão</title>

        <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="css/main.css" />
    </head>
    <body>
        <div class="centro">
            <h1 class="h1-login">Tricolly PET</h1>

            <form action="login.php" method="POST">
            <?php
            if ($_SESSION['nao_autenticado']) {
            ?>
                <div class="aviso alert alert-danger">Usuário e/ou senha inválidos.</div>
            <?php
                unset($_SESSION['nao_autenticado']);
            }
            ?>
                <label for="login">
                    Login
                </label>
                <input type="text" id="login" name="login" class="login form-control">
                <label for="senha">
                    Senha
                </label>
                <input type="password" name="senha" id="senha" class="senha form-control">
                <div class="div-centraliza">
                    <input type="submit" class="entrar btn btn-info" value="Entrar">
                </div>
            </form>
        </div>
    </body>
</html>
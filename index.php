<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Login Tricollypet Gestão</title>
        <style>
            html{
                height:100%;
            }
            body{
                display:flex;
                flex-direction:row;
                justify-content:space-around;
                align-items: center;
                height:100%;
            }
            .centro{
                display:flex;
                flex-direction:row;
                flex-wrap:wrap;
                background-color:rgba(0,0,0,.2);
                width:350px;
                padding:30px;
                border-radius:20px; 
                box-shadow: 1px 1px 3px #000;
                align-items: center;
                justify-content:space-around;
            }
            form{
                width:100%;
            }
            input{
                display:block;
                width:100%;
            }
            .entrar{
                margin-top:20px;
            }
        </style>
        
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <h1>Tricollypet Login</h1>
        <div class="centro">
            <form action="login.php" method="POST">
            <?php
            if ($_SESSION['nao_autenticado']) {
            ?>
                <div class="aviso alert alert-danger">Usuário e/ou senha inválidos.</div>
            <?php
                unset($_SESSION['nao_autenticado']);
            }
            ?>
                <div>
                    <label for="login">
                        Login
                    </label>
                    <input type="text" id="login" name="login" class="login">
                    <label for="senha">
                        Senha
                    </label>
                    <input type="password" name="senha" class="senha">
                    <input type="submit" class="entrar btn btn-info" value="Entrar">
                </div>
            </form>
        </div>
    </body>
</html>
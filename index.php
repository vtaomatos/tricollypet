<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Login Tricollypet Gestão</title>
        <style>
            .centro{
                display:flex;
                flex-direction:row;
                flex-wrap:wrap;
                background-color:rgba(0,0,0,.2);
                width:300px;
                padding:30px;
                border-radius:20px; 
                box-shadow: 1px 1px 3px #000;
                align-items: center;
                justify-content:space-aroundç;
            }
        </style>
        
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <div class="centro">
            <form action="login.php" method="POST"> 
                <div class="aviso"></div>
                <div>
                    <label>
                        Login
                        <input type="text" name="login" class="login">
                    </label>
                    <label>
                        Senha
                        <input type="password" name="senha" class="senha">
                    </label>
                </div>
            </form>
        </div>
    </body>
</html>
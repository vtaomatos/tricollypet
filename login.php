<?php
session_start();
require_once "functions.php";

if (empty($_POST['login']) || empty($_POST['senha'])) {
    $_SESSION['nao_autenticado'] = true;
    header("location: index.php");
    exit;
} else {
    $login = mysql_real_scape_string($conexao, $_POST['login']);
    $senha = mysql_real_scape_string($conexao, $_POST['senha']);

    $sql = '
        SELECT
            id_usuario
        FROM
            _Usuario
        WHERE
            login = :login
            AND
            senha = :senha
    ';
    $usuario = db_select_one($sql, array(
        'login' => $login,
        'senha' => $senha
    ));

    if (!empty($usuario)) {
        $_SESSION['cd_usuario'] = $usuario['id_usuario'];
        header("location: cadastro_pet.php");
        exit;
    } else {
        $_SESSION['nao_autenticado'] = true;
        header("location: index.php");
        exit;
    }

}
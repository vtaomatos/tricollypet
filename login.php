<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "functions.php";

if (empty($_POST['login']) || empty($_POST['senha'])) {
    $_SESSION['nao_autenticado'] = true;
    header("location: index.php");
    exit;
} else {
    
    $login = mysqli_real_escape_string($conexao, $_POST['login']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $sql = '
        SELECT
            id_usuario
        FROM
            _Usuario
        WHERE
            login = ":login"
            AND
            senha = md5(":senha")
    ';
    $usuario = db_select_one($sql, array(
        'login' => $login,
        'senha' => $senha
    ));

    if (!empty($usuario)) {
        $_SESSION['cd_usuario'] = $usuario['id_usuario'];
        header("location: index_pet.php");
        exit;
    } else {
        $_SESSION['nao_autenticado'] = true;
        header("location: index.php");
        exit;
    }

}
<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "functions.php";
$sql = '
    SELECT
        nome_usuario nome
    FROM
        _Usuario
    WHERE
        id_usuario = :codigo
';

$usuario = db_select_one($sql, array(
    'codigo' => $_SESSION['cd_usuario']
));

$boasVindas = "Olá, {$usuario['nome']}!";
?>
<nav id="menu" class="alert-info">
    <div class="container">
        <ul>
            <li>
                <?php echo $boasVindas;?>
            </li>
            <li>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </li>
        </ul>
    </div>
</nav>

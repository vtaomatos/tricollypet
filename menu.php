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

$pagina = $_SERVER['PHP_SELF'];

?>
<nav id="menu" class="alert-info">
    <div class="container">
        <ul>
            <li>
                <?php echo $boasVindas;?>
            </li>
            <li>
                <ul id="lista-links">
                    <li <?php echo ($pagina == "/cadastro_pet.php" ) ? 'class="selected"' : "" ?>>
                        <a href="cadastro_pet.php">
                            Cadastro de PET
                        </a>
                    </li>
                    <li <?php echo ($pagina == "/cadastro_usuario.php" ) ? 'class="selected"' : "" ?>>
                        <a href="cadastro_usuario.php">
                            Cadastro de Usuario
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </li>
        </ul>
    </div>
</nav>

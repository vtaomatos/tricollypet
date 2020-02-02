<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    require_once "functions.php";
function menu($pagina) {

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
                    <ul id="lista-links">
                        <li <?php echo ($pagina == "pet" ) ? 'class="selected"' : "" ?>>
                            <a href="cadastro_pet.php">
                                Gestão de PET
                            </a>
                        </li>
                        <li <?php echo ($pagina == "usuario" ) ? 'class="selected"' : "" ?>>
                            <a href="cadastro_usuario.php">
                                Gestão de Usuario
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
<?php
}
?>
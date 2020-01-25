<?php
if (!isset($_SESSION)) {
    session_start();
}
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
<style>
    #menu{
        width:100%;
        height:60px;
        display:flex;
        flex-direction:row;
        justify-content:space-between;
        align-items:center;
        position:fixed;
        top:0;
        box-shadow:#000 0px -30px 50px;
    }
    #menu ul{
        display:flex;
        flex-direction:row;
        justify-content:space-between;
        align-items:center;
        width:100%;
        height:100%;
        margin-top:0;
        margin-bottom:0;
        border-radius:10px 5px 15px 20px;
    }
    li{
        list-style:none;
        align-items:center;
    }

</style>
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

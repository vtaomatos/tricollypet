<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!empty($_SESSION['cd_usuario'])) {
    unset($_SESSION['cd_usuario']);
}
header("location: index.php");
<?php
  require_once "check_logado.php";
  require_once "gera_menu.php";
  require_once "menu.php";
?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF8-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tricolly Pet Boutique</title>
  
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <?php
    menu("pet");
    ?>

</body>
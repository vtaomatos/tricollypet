<?php
  require_once "check_logado.php";
  require_once "gera_menu.php";
  require_once "menu.php";

  $sql = '
    SELECT
        pet_id,
        nome,
        especie,
        raca
    FROM
        _cadastro_pet
  ';
    $pets = db_select($sql);
    
    $parametros = array();
    $parametros[1] = array(
      'novo' => true,
      'novoLink' => "cadastro_pet.php",
      'novoText' => "Novo Pet"
    );
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
    <div class="container" id="conteiner-geral">
        <h1>Tricollypet - Lista de PETs</h1>
        <br clear="both">
        <?php

        gera_menu($parametros);
        ?>
        <br clear="both">
        <br clear="both">

        <?php
        monta_tabela(array(
            'pet_id' => "Código",
            'nome' => "Nome",
            'especie' => "Espécie",
            'raca' => "Raça"
        ), $pets, array(
            'chave' => 'pet_id',
            'prox_page' => 'editar_pet.php'
        ));
        ?>
    </div>
    

</body>
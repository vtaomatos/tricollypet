<?php
  require_once "check_logado.php";
  require_once "gera_menu.php";
  require_once "menu.php";

  $sql = '
    SELECT
        *   
    FROM
        _cadastro_pet
    WHERE
        pet_id = ":codigo"
  ';
    $pet = db_select_one($sql, array(
        'codigo' => !empty($_GET['codigo']) ? $_GET['codigo'] : ""
    ));    
    
    $parametros = array();
    $parametros[0] = array();
    $parametros[0]['text'] = "Lista de PETs";
    $parametros[0]['link'] = "index_pet.php";
    
    $parametros[1] = array();
    $parametros[1]['text'] = "Editar PET";
    $parametros[1]['link'] = "editar_pet.php";
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
        <h1>Tricollypet - Detalhes do PET</h1>
        <br clear="both">
        <?php
            gera_menu($parametros);
        ?>
            <br clear="both">
            <br clear="both">

            <form class="formulario container" method="POST" action="CRUD.php">
        <div class="esquerda">
          <div class="form-row">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text largo" class="form-control" placeholder="Nome" name="nome" value="<?php echo !empty($pet['nome']) ? $pet['nome'] : ""; ?>" id="nome">
            </div>
          </div>


          <div class="form-row">
            <div class="form-group">
              <label for="dt_nasc">Data de Nascimento</label>
              <input type="date" class="form-control" name="dt_nasc" value="<?php echo !empty($pet['dt_nasc']) ? $pet['dt_nasc'] : ""; ?>" id="dt_nasc" >
            </div>
          </div>
          <?php
          $cachorro = ($pet['especie'] == "cachorro") ? "checked" : "";
          $gato = ($pet['especie'] == "gato") ? "checked" : "";
          ?>
          <legend class="col-form-label">Espécie</legend>
          <div class="engloba-radios-horizontal">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="especie" id="cachorro" value="cachorro" <?php echo $cachorro; ?> >
              <label class="form-check-label" for="cachorro">
                Cachorro
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="especie" id="gato" value="gato" <?php echo $gato; ?> >
              <label class="form-check-label" for="gato">
                Gato
              </label>
            </div>  
          </div>


          <div class="form-group">
            <label for="cor">Cor</label>
            <input type="text" class="form-control" value="<?php echo !empty($pet['cor']) ? $pet['cor'] : ""; ?>" id="cor" placeholder="Cor" name="cor">
          </div>

          <div class="form-group">
            <label for="porte">Porte</label>
            <select class="form-control" name="porte" value="<?php echo !empty($pet['porte']) ? $pet['porte'] : ""; ?>" id="porte">
                <?php
                $opcoes = array(
                    'Micro',
                    'Pequeno',
                    'Médio',
                    'Grande',
                    'Gigante'
                );
                foreach ($opcoes as $opcao) {
                    ?>
                    <option <?php echo ($opcao == $pet['porte']) ? "selected" : ""; ?> ><?php echo $opcao; ?></option>
                    <?php
                }
                ?>
            </select>
          </div>

          <div class="form-group">
            <label for="raca">Raça</label>  
            <input type="text" class="form-control" name="raca" value="<?php echo !empty($pet['raca']) ? $pet['raca'] : ""; ?>" id="raca">
          </div>

          <?php
          $curto = ($pet['tp_pelo'] == "curto") ? "checked" : "";
          $medio = ($pet['tp_pelo'] == "medio") ? "checked" : "";
          $longo = ($pet['tp_pelo'] == "longo") ? "checked" : "";
          ?>
          <div class="form-group">
            <legend class="col-form-label">Tipo de Pelo</legend>
            <div class="form-row engloba-radios-vertical">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tp_pelo" <?php echo $curto; ?> id="curto" value="curto" checked>
                <label class="form-check-label" for="curto">
                  Curto
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tp_pelo" <?php echo $medio; ?> id="medio" value="medio">
                <label class="form-check-label" for="medio">
                  Médio
                </label>
              </div>  
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tp_pelo" <?php echo $longo; ?> id="longo" value="longo">
                <label class="form-check-label" for="longo">
                  Longo
                </label>
              </div>  
            </div>
          </div>
          
          <div class="form-group">
            <label for="">Peso (kg)</label>
            <input type="number" class="form-control" value="<?php echo !empty($pet['peso']) ? $pet['peso'] : ""; ?>" id="peso" placeholder="Peso (Kg)" name="peso">
          </div>

          <div class="form-group">
            <label for="forma_tratamento">Forma de Tratamento</label>  
            <select class="form-control" name="forma_tratamento" value="<?php echo !empty($pet['']) ? $pet[''] : ""; ?>" id="forma_tratamento">
              <?php
              $formas_tratamento = array(
                'Tutor',
                'Pai/Mãe',
                'Dono'
              );
              foreach ($formas_tratamento as $forma) {
                ?>
                <option <?php echo ($forma == $pet['forma_tratamento']) ? "selected" : ""; ?>><?php echo $forma; ?></option>
                <?php
              }
              ?>
            </select>
          </div>
        </div>


        <div class="direita">
          <div class="form-group">
            <label for="">Alergias</label>
            <input type="text" class="form-control" value="<?php echo !empty($pet['alergiar']) ? $pet['alergiar'] : ""; ?>" id="alergiar" placeholder="" name="alergiar">
          </div>

          <div class="form-group">
            <label for="">Doenças</label>
            <input type="text" class="form-control" value="<?php echo !empty($pet['doencas']) ? $pet['doencas'] : ""; ?>" id="doencas" placeholder="" name="doencas">
          </div>

          <?php
            $entregue = ($pet['vacinacao'] == "entregue") ? "checked" : "";
            $faltante = ($pet['vacinacao'] == "faltante") ? "checked" : "";
        ?>
          <legend class="col-form-label">Carteirinha de Vacinação</legend>
          <div class="form-group engloba-radios-horizontal">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="vacinacao" <?php echo $entregue ?> id="entregue" value="entregue">
              <label class="form-check-label" for="entregue">
                Entregue
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="vacinacao" <?php echo $faltante ?> id="faltante" value="entregue">
              <label class="form-check-label" for="entregue">
                Faltante
              </label>
            </div>  
          </div>

          <div class="form-group">
            <label for="tipo_perfume">Perfume</label>  
            <select class="form-control" name="tipo_perfume" id="tipo_perfume">
              <?php
                $opcoes = array(
                    'perfume1',
                    'perfume2',
                    'perfume3'
                );
                foreach ($opcoes as $opcao) {
              ?>
                <option <?php echo ($opcao == $pet['tipo_perfume']) ? "select" : ""; ?>><?php echo $opcao; ?></option>
              <?php
                }
              ?>
            </select>
          </div>

            <?php
                $enfeites = explode(",",$pet['enfeite']);
                $laco = (in_array("laco",$enfeites)) ? "checked" : "";
                $borboleta = (in_array("gravata_borboleta",$enfeites)) ? "checked" : "";
                $tradicional = (in_array("gravata-tradicional",$enfeites)) ? "checked" : "";
                $gola = (in_array("gola",$enfeites)) ? "checked" : "";
            ?>

          <div class="form-group">
            <label for="">Enfeite</label> 
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="laco" <?php echo $laco; ?> id="laco" name="enfeite[]">
              <label class="form-check-label" for="laco">
                Laço
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="gravata_borboleta" name="enfeite[]" <?php echo $borboleta; ?> id="gravata-borboleta">
              <label class="form-check-label" for="gravata_borboleta">
                Gravata Borboleta 
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="gravata-tradicional" name="enfeite[]" <?php echo $tradicional; ?> id="gravata-tradicional">
              <label class="form-check-label" for="gravata-tradicional">
                Gravata Tradicional
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="gola" name="enfeite[]" <?php echo $gola; ?> id="gola">
              <label class="form-check-label" for="gola">
                Gola 
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="tipo_banho">Tipo de Banho</label>  
            <select class="form-control"  name="tipo_banho" id="tipo_banho">
                <?php
                    $opcoes = array(
                        'Conde',
                        'Visconde',
                        'Duque',
                        'Príncipe'
                    );
                    foreach ($opcoes as $opcao) {
                    ?>
                    <option <?php echo ($opcao == $pet['tipo_banho']) ? "selected" : ""; ?>><?php echo $opcao; ?></option>
                    <?php
                    }
                ?>
            </select>
          </div> 

          <div class="form-group">
            <label for="observacao">Observações</label>  
            <textarea class="form-control" name="observacao" id="observacao" rows="8"><?php echo !empty($pet['observacao']) ? $pet['observacao'] : ""; ?></textarea>
          </div>

          <div id="assinatura" class="text-right">
            <hr>
            <p id="desc-assinatura">
              Assinatura
            </p>
          </div>

          <br clear="both">
          <br clear="both">

          <input type="hidden" name="editar" value="editar"/>
          <button type="submit" class="btn btn-info float-right col-md-6" id="btn-Cad">Editar</button>
        </div>
      </form>
    </div>
</body>
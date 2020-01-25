<?php
  require_once "functions.php";
  require_once "check_logado.php";
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
      require_once "menu.php";
  ?>
  <div class="container" id="conteiner-geral">
      <h1 class="text-center">Tricolly - Cadastro de PET</h1>
      <?php
        if (!empty($_GET['msg'])) { ?>
          <br clear="both">
          <div class="text-center alert alert-<?php echo (!empty($_GET['success'])) ? "success" : "danger"?>"><?php echo $_GET['msg']; ?></div> 
      <?php
        }
        $_GET['msg'] = "";
      ?>
      <form class="formulario container" method="GET" action="CRUD.php">
        <div class="esquerda">
          <div class="form-row">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text largo" class="form-control" placeholder="Nome" name="nome" id="nome">
            </div>
          </div>


          <div class="form-row">
            <div class="form-group">
              <label for="dt_nasc">Data de Nascimento</label>
              <input type="date" class="form-control" placeholder="XX/XX/XXXX" name="dt_nasc" id="dt_nasc" >
            </div>
          </div>

          <legend class="col-form-label">Espécie</legend>
          <div class="engloba-radios-horizontal">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="especie" id="cachorro" value="cachorro" checked>
              <label class="form-check-label" for="cachorro">
                Cachorro
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="especie" id="gato" value="gato">
              <label class="form-check-label" for="gato">
                Gato
              </label>
            </div>  
          </div>


          <div class="form-group">
            <label for="cor">Cor</label>
            <input type="text" class="form-control" id="cor" placeholder="Cor" name="cor">
          </div>

          <div class="form-group">
            <label for="porte">Porte</label>
            <select class="form-control" name="porte" id="porte">
              <option>Micro</option>
              <option>Pequeno</option>
              <option>Médio</option>
              <option>Grande</option>
              <option>Gigante</option>
            </select>
          </div>

          <div class="form-group">
            <label for="raca">Raça</label>  
            <input type="text" class="form-control" name="raca" id="raca">
          </div>
          
          <div class="form-group">
            <legend class="col-form-label">Tipo de Pelo</legend>
            <div class="form-row engloba-radios-vertical">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tp_pelo" id="curto" value="curto" checked>
                <label class="form-check-label" for="curto">
                  Curto
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tp_pelo" id="medio" value="medio">
                <label class="form-check-label" for="medio">
                  Médio
                </label>
              </div>  
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tp_pelo" id="longo" value="longo">
                <label class="form-check-label" for="longo">
                  Longo
                </label>
              </div>  
            </div>
          </div>
          
          <div class="form-group">
            <label for="">Peso (kg)</label>
            <input type="number" class="form-control" id="peso" placeholder="Peso (Kg)" name="peso">
          </div>

          <div class="form-group">
            <label for="forma_tratamento">Forma de Tratamento</label>  
            <select class="form-control" name="forma_tratamento" id="forma_tratamento">
              <option>Tutor</option>
              <option>Pai/Mãe</option>
              <option>Dono</option>
            </select>
          </div>
        </div>


        <div class="direita">
          <div class="form-group">
            <label for="">Alergias</label>
            <input type="text-area" class="form-control" id="alergiar" placeholder="" name="alergiar">
          </div>

          <div class="form-group">
            <label for="">Doenças</label>
            <input type="text-area" class="form-control" id="doencas" placeholder="" name="doencas">
          </div>

          <legend class="col-form-label">Carteirinha de Vacinação</legend>
          <div class="form-group engloba-radios-horizontal">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="vacinacao" id="entregue" value="entregue" checked>
              <label class="form-check-label" for="entregue">
                Entregue
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="vacinacao" id="faltante" value="entregue">
              <label class="form-check-label" for="entregue">
                Faltante
              </label>
            </div>  
          </div>

          <div class="form-group">
            <label for="tipo_perfume">Perfume</label>  
            <select class="form-control" name="tipo_perfume" id="tipo_perfume">
              <option value="perfume1" >perfume1</option>
              <option value="perfume2" >perfume2</option>
              <option value="perfume3" >perfume3</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Enfeite</label> 
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="laco" id="laco" name="enfeite[]">
              <label class="form-check-label" for="laco">
                Laço
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="gravata_borboleta" name="enfeite[]" id="gravata-borboleta">
              <label class="form-check-label" for="gravata_borboleta">
                Gravata Borboleta 
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="gravata-tradicional" name="enfeite[]" id="gravata-tradicional">
              <label class="form-check-label" for="gravata-tradicional">
                Gravata Tradicional
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="gola" name="enfeite[]" id="gola">
              <label class="form-check-label" for="gola">
                Gola 
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="tipo_banho">Tipo de Banho</label>  
            <select class="form-control"  name="tipo_banho" id="tipo_banho">
              <option>Conde</option>
              <option>Visconde</option>
              <option>Duque</option>
              <option>Príncipe</option>
            </select>
          </div> 

          <div class="form-group">
            <label for="observacao">Observações</label>  
            <textarea class="form-control" name="observacao" id="observacao" rows="8"></textarea>
          </div>

          <div id="assinatura" class="text-right">
            <hr>
            <p id="desc-assinatura">
              Assinatura
            </p>
          </div>



          <br clear="both">
          <br clear="both">

          <input type="hidden" name="cadastrar" value="cadastrar"/>
          <button type="submit" class="btn btn-info float-right col-md-6" id="btn-Cad">Cadastrar</button>
        </div>
      </form>
  </div>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>

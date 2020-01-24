<?php

require_once "functions.php";


if (!empty($_GET['cadastrar'])) {
    
    $insert = array();
    $msg = "";

    $obrigatorios = array(
        'nome' => 'Nome',
        'dt_nasc' => 'Data de nascimento'
    );

    if (!empty($_GET['nome'])) {
        $insert['nome'] = $_GET['nome'];
    }
    if (!empty($_GET['dt_nasc'])) {
        $insert['dt_nasc'] = $_GET['dt_nasc'];
    }
    if (!empty($_GET['especie'])) {
        $insert['especie'] = $_GET['especie'];
    }
    if (!empty($_GET['cor'])) {
        $insert['cor'] = $_GET['cor'];
    }
    if (!empty($_GET['porte'])) {
        $insert['porte'] = $_GET['porte'];
    }
    if (!empty($_GET['raca'])) {
        $insert['raca'] = $_GET['raca'];
    }
    if (!empty($_GET['tp_pelo'])) {
        $insert['tp_pelo'] = $_GET['tp_pelo'];
    }
    if (!empty($_GET['peso'])) {
        $insert['peso'] = $_GET['peso'];
    }
    if (!empty($_GET['forma_tratamento'])) {
        $insert['forma_tratamento'] = $_GET['forma_tratamento'];
    }
    if (!empty($_GET['alergiar'])) {
        $insert['alergiar'] = $_GET['alergiar'];
    }
    if (!empty($_GET['doencas'])) {
        $insert['doencas'] = $_GET['doencas'];
    }
    if (!empty($_GET['vacinacao'])) {
        $insert['vacinacao'] = $_GET['vacinacao'];
    }
    if (!empty($_GET['tipo_perfume'])) {
        $insert['tipo_perfume'] = $_GET['tipo_perfume'];
    }
    if (!empty($_GET['enfeite'])) {
        $insert['enfeite'] = join(",",$_GET['enfeite']);
    }
    if (!empty($_GET['tipo_banho'])) {
        $insert['tipo_banho'] = $_GET['tipo_banho'];
    }

    foreach ($obrigatorios as $campo => $alias) {
        if (empty($_GET[$campo])) {
            $msg .= "Preencha o campo $alias. <br   >";
        }
    }

    if (!empty($msg)) {
        header("location: cadastro_pet.php?msg=$msg");
        exit;
    }

    // echo_r(db_insert('Cadastro_Pet',$insert,true,true));exit;


    if ($codigo = db_insert('Cadastro_Pet',$insert,true)) {
        $msg = "O PET foi cadastrado. [ {$codigo} - {$_GET['nome']} ] ";
        header("location: cadastro_pet.php?msg=$msg&success=1");
        exit;
    } else {
        $msg = "Não foi possível inserir. Contate o administrador.";
        header("location: cadastro_pet.php?msg=$msg");
        exit;
    }
}

<?php

require_once "functions.php";


if (!empty($_POST['cadastrar'])) {
    
    $insert = array();
    $msg = "";

    $obrigatorios = array(
        'nome' => 'Nome',
        'dt_nasc' => 'Data de nascimento'
    );

    foreach ($obrigatorios as $campo => $alias) {
        if (empty($_POST[$campo])) {
            $msg .= "Preencha o campo $alias. <br   >";
        }
    }

    if (!empty($msg)) {
        header("location: cadastro_pet.php?msg=$msg");
        exit;
    }

    if (!empty($_POST['nome'])) {
        $insert['nome'] = $_POST['nome'];
    }
    if (!empty($_POST['dt_nasc'])) {
        $insert['dt_nasc'] = $_POST['dt_nasc'];
    }
    if (!empty($_POST['especie'])) {
        $insert['especie'] = $_POST['especie'];
    }
    if (!empty($_POST['cor'])) {
        $insert['cor'] = $_POST['cor'];
    }
    if (!empty($_POST['porte'])) {
        $insert['porte'] = $_POST['porte'];
    }
    if (!empty($_POST['raca'])) {
        $insert['raca'] = $_POST['raca'];
    }
    if (!empty($_POST['tp_pelo'])) {
        $insert['tp_pelo'] = $_POST['tp_pelo'];
    }
    if (!empty($_POST['peso'])) {
        $insert['peso'] = $_POST['peso'];
    }
    if (!empty($_POST['forma_tratamento'])) {
        $insert['forma_tratamento'] = $_POST['forma_tratamento'];
    }
    if (!empty($_POST['alergiar'])) {
        $insert['alergiar'] = $_POST['alergiar'];
    }
    if (!empty($_POST['doencas'])) {
        $insert['doencas'] = $_POST['doencas'];
    }
    if (!empty($_POST['vacinacao'])) {
        $insert['vacinacao'] = $_POST['vacinacao'];
    }
    if (!empty($_POST['tipo_perfume'])) {
        $insert['tipo_perfume'] = $_POST['tipo_perfume'];
    }
    if (!empty($_POST['enfeite'])) {
        $insert['enfeite'] = join(",",$_POST['enfeite']);
    }
    if (!empty($_POST['tipo_banho'])) {
        $insert['tipo_banho'] = $_POST['tipo_banho'];
    }
    if (!empty($_POST['observacao'])) {
        $insert['observacao'] = $_POST['observacao'];
    }
    // db_insert('Cadastro_Pet',$insert,0,true);exit;
    if ($codigo = db_insert('Cadastro_Pet',$insert,true)) {
        $msg = "O PET foi cadastrado. [ {$codigo} - {$_POST['nome']} ] ";
        header("location: cadastro_pet.php?msg=$msg&success=1");
        exit;
    } else {
        $msg = "Não foi possível inserir. Contate o administrador.";
        header("location: cadastro_pet.php?msg=$msg");
        exit;
    }
}

if (!empty($_POST['cadastrar_usuario'])) {
    $insert = array();
    $msg = "";

    $obrigatorios = array(
        'nome_usuario' => 'Nome',
        'login' => 'Login',
        'senha' => 'Senha',
        'confirma_senha' => 'Confirme a senha'
    );

    foreach ($obrigatorios as $campo => $alias) {
        if (empty($_POST[$campo])) {
            $msg .= "Preencha o campo $alias. <br   >";
        }
    }

    if (!empty($_POST['nome_usuario'])) {
        $insert['nome_usuario'] = $_POST['nome_usuario'];
    }
    if (!empty($_POST['login'])) {
        $insert['login'] = $_POST['login'];
    }
    if (!empty($_POST['senha']) && !empty($_POST['confirma_senha']) &&
            $_POST['confirma_senha'] == $_POST['senha']) {
        $insert['senha'] = md5($_POST['senha']);
    } else {
        $msg .= "Preencha corretamente os campos de senha. <br>";
    }


    if (!empty($msg)) {
        header("location: cadastro_usuario.php?msg=$msg");
        exit;
    }
    // db_insert('_Usuario',$insert,0,1);exit;
    if ($codigo = db_insert('_Usuario',$insert,true)) {
        $msg = "O Usuário foi cadastrado. [ {$codigo} - {$_POST['nome_usuario']} ] ";
        header("location: cadastro_usuario.php?msg=$msg&success=1");
        exit;
    } else {
        $msg = "Não foi possível inserir. Contate o administrador.";
        header("location: cadastro_usuario.php?msg=$msg");
        exit;
    }
}

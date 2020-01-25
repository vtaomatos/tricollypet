<?php
ini_set('display_errors',1);

include_once "conexao.php";

function get_conexao() {
    global $conexao;
    if (!$conexao) {
        exit("Conex�o inv�lida");
    }
    return $conexao;
}

function db_select($comando, $array=array(), $cabecalho=false) {

    $comando = !empty($array) ? sf($comando, $array) : $comando;
    
    $resultado = mysqli_query(get_conexao(), $comando);
    $saida = mysqli_fetch_all($resultado);
    $lista = array();
    $campos = campos($resultado);

    array_walk($saida, function($elementoPai, $chavePai) use (&$lista, $campos) {
        array_walk($elementoPai, function($valor, $chave) use (&$lista, $campos, $chavePai){
            $lista[$chavePai][$campos[$chave]] = $valor;
        });
    });

    $saida = $lista;

    if (!empty($cabecalho)) {
        array_unshift($saida,$campos);
    }

    // array_walk_recursive($saida, function(&$item){
    //     $item = utf8_encode($item);
    // });

    return $saida;
}

function db_select_one($comando, $array=array(), $cabecalho=false) {
    $retorno = db_select($comando, $array, $cabecalho);
    if (count($retorno) == 1) {
        $retorno = array_shift($retorno);
    } else {
        $retorno = false;
    }
    return $retorno;
}

function adiciona_campo($array) {
    $chaves = array_keys($array);
    $colunas = implode("`,`", $chaves);
    $colunas = "`".$colunas."`";
    return $colunas;
}

function adiciona_valores($array) {
    $valores = array_walk($array, function ($elemento) {
        $elemento = mysqli_real_escape_string(get_conexao(), $elemento);
    });
    $valores = implode("','",$array);
    $valores = "'".$valores."'";
    return $valores;
}

function db_insert($tabela="",$array=array(),$codigo=false,$echo=false) {
    $saida = 0;

    $colunas = adiciona_campo($array);
    $valores = adiciona_valores($array);
    $comando = "Insert into $tabela ($colunas) values ($valores)";
    $resultado = mysqli_query(get_conexao(), $comando);
    
    if ($echo) {
        echo_r($comando);
    }

    if (!empty($resultado)) {
        $saida = 1;
    }

    if (!empty($codigo)) {
        return mysqli_insert_id(get_conexao());
    }
    return $saida;
}

function db_update($nome_tabela, $campos, $where, $echo=false) {
    if (empty($campos)) {
        exit("PASSAR CAMPOS");
    }
    if (empty($nome_tabela)) {
        exit("PASSAR NOME DA TABELA");
    }
    if (empty($where)) {
        exit("PASSAR WHERE");
    }
    $keys = array_keys($campos);
    $set = array();
    array_walk($keys, function($valor) use ($campos, &$set){
        if ($campos[$valor] == null) {
            $set[] = $valor . ' = NULL';
        } else {
            $set[] = $valor . ' = "'. msqli_real_escape_string($campos[$valor]).'"';
        }
    });
    $campos = join(", ", $set);

    $keys = array_keys($where);
    $condicao = array();
    array_walk($keys, function($valor) use ($where, &$condicao) {
        if ($where[$valor] == null) {
            $condicao[] = $valor . ' = NULL';
        } else {
            $condicao[] = $valor . ' = "'. msqli_real_escape_string($where[$valor]).'"';
        }
    });
    $where = join(" AND ", $condicao);

    $sql = '
        UPDATE
            :nome_tabela
        SET
            :campos
        WHERE
            :where
    ';
    $comando = sf($sql, array(
        'nome_tabela' => $nome_tabela,
        'campos' => $campos,
        'where' => $where
    ));

    if ($echo) {
        echo_r($comando);
    }
    $comando = utf8_decode($comando);
    mysqli_query(get_conexao(), $comando);
}

function db_delete ($tabela_nome, $where=array()) {
    if (empty($where)) {
        exit("PASSE O WHERE");
    }

    $condicao = array();
    array_walk($where, function($valor, $chave) use (&$condicao){
        $condicao[] = $chave . ' = "'. mysqli_real_escape_string($valor).'"';
    });

    $where = join(" AND ", $condicao);

    $sql = '
        DELETE
            FROM
                :tabela
            WHERE
                :where
    ';

    $comando = sf($sql, array(
        'tabela' => $tabela_nome,
        'where' => $where
    ));

    $comando = utf8_decode($comando);

    mysqli_query(get_conexao(), utf8_decode($comando));
}

function campos($resultado){
    $saida = mysqli_fetch_fields($resultado);
    array_walk($saida, function (&$campo) {
        $campo = $campo->name;
    });
    return $saida;
}

function echo_r($conteudo = "") {
    print_r("<pre>");
    print_r($conteudo);
    print_r("</pre>");
}

function sf($string, $array) {
    array_walk($array, function ($valor, $chave) use (&$string){
        $string = str_replace(":".$chave, $valor, $string);
    });
    return $string;
}

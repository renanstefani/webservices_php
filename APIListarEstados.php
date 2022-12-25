<?php

// Conexão com o DB
require_once('dbConnect.php');

// Definindo UTF8 e evitando conflitos

mysqli_set_charset($conn, $charset);

//criamos um array vazio para receber o select
$response = array();

//realizando a consulta
$stmt = mysqli_prepare($conn, 'SELECT id, sigla, nome FROM estado');

//realiza o select
mysqli_stmt_execute($stmt);

//armazena a resposta
mysqli_stmt_store_result($stmt);

//define os dados recebidos
mysqli_stmt_bind_result(
    $stmt,
    $id,
    $sigla,
    $nome
);

// var_dump($stmt);

// se o numero de linhas for maior que zero
// significa que possui dados
if(mysqli_stmt_num_rows($stmt) > 0){

    while(mysqli_stmt_fetch($stmt)){
        
        array_push($response, array(
            "id" => $id,
            "sigla" => $sigla,
            "nome" => $nome
            )
        );
    }

    echo json_encode($response);

}else{
    echo json_encode($response);
}


?>
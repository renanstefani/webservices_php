<?php
// Verificamos o tipo de requisição para darmos continuidade
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //definimos a compatibilidade apontando o tipo de conteúdo:
    header('Content-type: application/json');

    // TOKEN
    $api_token = "renanstefanidev";

    if ($api_token == 'renanstefanidev') {

        // Conexão com o DB
        require_once('dbConnect.php');

        // Definindo UTF8 e evitando conflitos
        mysqli_set_charset($conn, $charset);

        //criamos um array vazio para receber o select
        $response = array();

        //realizando a consulta
        $stmt = mysqli_prepare($conn, 'SELECT id, estadoID, nome FROM cidade');

        //executando o select
        mysqli_stmt_execute($stmt);

        //armazenando a resposta
        mysqli_stmt_store_result($stmt);

        //definindo os dados recebidos
        mysqli_stmt_bind_result(
            $stmt,
            $id,
            $estadoID,
            $nome
        );

        // var_dump($stmt);

        // se o numero de linhas for maior que zero possui dado a ser retornado
        if (mysqli_stmt_num_rows($stmt) > 0) {

            while (mysqli_stmt_fetch($stmt)) {

                array_push(
                    $response,
                    array(
                        "id" => $id,
                        "estadoID" => $estadoID,
                        "nome" => $nome
                    )
                );
            }

            echo json_encode($response);

        } else {
            echo json_encode($response);
        }


    } else {
        $response['auth_token'] = false;

        echo json_encode($response);
    }


}
?>
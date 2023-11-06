<?php

function criarNovaCategoria($conn, $nomeCategoria)
{
    $verificarCategoria = "SELECT idcategoria FROM categoria WHERE nomeCategoria = ?";
    $stmtVerificar = $conn->prepare($verificarCategoria);
    $stmtVerificar->bind_param("s", $nomeCategoria);
    $stmtVerificar->execute();
    $result = $stmtVerificar->get_result();

    if ($result->num_rows > 0) {
        return array(
            "sucesso" => false,
            "mensagem" => "Categoria já existe no banco de dados."
        );
    } else {
        $sql_inserir_categoria = "INSERT INTO `categoria` (`nomeCategoria`) VALUES (?)";
        $stmt = $conn->prepare($sql_inserir_categoria);
        $stmt->bind_param("s", $nomeCategoria);

        if ($stmt->execute()) {
            $novaCategoriaId = $conn->insert_id;
            return array(
                "novaCategoriaId" => $novaCategoriaId,
                "sucesso" => true
            );
        } else {
            return array("sucesso" => false, "mensagem" => "Erro ao adicionar categoria.");
        }
    }
}


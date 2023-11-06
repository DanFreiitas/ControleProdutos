<?php

function adicionarProduto($conn, $produto)
{
    if (empty($produto["nomeProduto"])) {
        echo "<script>alert('O nome do produto é obrigatório')</script>";
        header("Refresh: 2;../view/dashboard.php?pagina=novoProduto");
    } else {
        if (isset($produto['idCategoria'])) {
            $categoriaId = intval($produto['idCategoria']);

            $verificarCategoriaExistente = "SELECT idcategoria FROM categoria WHERE idcategoria = ?";
            $stmtVerificarCategoria = $conn->prepare($verificarCategoriaExistente);
            $stmtVerificarCategoria->bind_param("i", $categoriaId);
            $stmtVerificarCategoria->execute();

            $resultCategoria = $stmtVerificarCategoria->get_result();

            if ($resultCategoria->num_rows === 0) {
                $novaCategoria = criarNovaCategoria($conn, $produto['nomeCategoria']);
                if ($novaCategoria['sucesso']) {
                    $categoriaId = $novaCategoria['novaCategoriaId'];
                } else {
                    echo "<script>alert('Erro ao criar a nova categoria.')</script>";
                    header("Refresh: 2;../view/dashboard.php?pagina=novoProduto");
                    return;
                }
            }

            $sql_inserir = "INSERT INTO produto (nomeProduto, fabricante_idfabricante, preco, caracteristica, quantidade, categoria_idcategoria) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql_inserir);
            $stmt->bind_param("sidsii", $produto["nomeProduto"], $produto["idFabricante"], $produto["preco"], $produto["caracteristica"], $produto["quantidade"], $categoriaId);

            if ($stmt->execute()) {
                #echo "<script>alert('Produto adicionado com sucesso!')</script>";
                header("Refresh: 2;../view/dashboard.php?pagina=novoProduto&success=novo");
            } else {
                echo "<script>alert('Ocorreu algum erro, tente novamente ou entre em contato com alguém.')</script>";
            }
        }
    }
}



#function adicionarProduto($conn, $produto)
#{
#    if (empty($produto["nomeProduto"])) {
#        echo "<script>alert('O nome do produto é obrigatório')</script>";
#        header("Refresh: 2;../view/dashboard.php?pagina=novoProduto");
#    } else {
#        $sql_inserir = "INSERT INTO produto (nomeProduto, fabricante_idfabricante, preco, caracteristica, quantidade, categoria_idcategoria) VALUES (?, ?, ?, ?, ?, ?)";
#        $stmt = $conn->prepare($sql_inserir);
#        $stmt->bind_param("sidsii", $produto["nomeProduto"], $produto["idFabricante"], $produto["preco"], $produto["caracteristica"], $produto["quantidade"], $produto['idCategoria']);
#
#        if ($stmt->execute()) {
#            echo "<script>alert('Produto adicionado com sucesso!')</script>";
#            header("Refresh: 2;../view/dashboard.php?pagina=novoProduto");
#        } else {
#            echo "<script>alert('Ocorreu algum erro, tente novamente ou entre em contato com";
#        }
#    }
#}
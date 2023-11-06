<?php
include './config.php';
include '../model/addProduto.php';
include '../model/addCategoriaModal.php';

#if ($_SERVER['REQUEST_METHOD'] === 'POST') {
#    if(isset($_POST['acao']) && $_POST['acao'] === 'produto') {
#        $produto = array(
#            "nomeProduto" => ucfirst(strtolower($_POST["nomeProduto"])),
#            "idFabricante" => intval($_POST["fabricante"]),
#            "preco" => floatval($_POST["preco"]),
#            "caracteristica" => strtolower($_POST["caracteristica"]),
#            "quantidade" => intval($_POST["quantidade"]),
#        );
#
#        if(isset($_POST['novaCategoria']) && $_POST['novaCategoria']) {
#            $novaCategoriaNome = ucfirst(strtolower($_POST["novaCategoria"])); 
#        } else {
#            $produto["idCategoria"] = intval($_POST["idCategoria"]);
#        }
#    
#        adicionarProduto($conn, $produto);
#    }
#}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['acao']) && $_POST['acao'] === 'produto') {
        $produto = array(
            "nomeProduto" => ucfirst(strtolower($_POST["nomeProduto"])),
            "idFabricante" => intval($_POST["fabricante"]),
            "preco" => floatval($_POST["preco"]),
            "caracteristica" => strtolower($_POST["caracteristica"]),
            "quantidade" => intval($_POST["quantidade"]),
        );

        if(isset($_POST['novaCategoria']) && $_POST['novaCategoria']) {
            $novaCategoriaNome = ucfirst(strtolower($_POST["novaCategoria"])); 
            $resultadoCriacaoCategoria = criarNovaCategoria($conn, $novaCategoriaNome);

            if ($resultadoCriacaoCategoria['sucesso']) {
                $produto["idCategoria"] = $resultadoCriacaoCategoria['novaCategoriaId'];
            } else {
                #echo "<script>alert('Categoria já existe! .')</script>";
                header("Refresh: 2;../view/dashboard.php?pagina=novoProduto&success=false");
            }
        } else {
            $produto["idCategoria"] = intval($_POST["idCategoria"]);
        }
    
        adicionarProduto($conn, $produto);
    }
}



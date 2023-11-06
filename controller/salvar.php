<?php
require_once "config.php";
require_once "model.php";

switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nomeFabricante = $_POST["nomeFabricante"];
        $categoriaUm = $_POST["categoriaUm"];
        $categoriaDois = $_POST["categoriaDois"];
        $categoriaTres = $_POST["categoriaTres"];

        if (empty($nomeFabricante) || empty($categoriaUm)) {
            echo "Preencha todos os campos obrigatórios.";
            return; // Saia da função se campos obrigatórios estiverem em branco
        }

        if (cadastrarFabricante($conn, $nomeFabricante, $categoriaUm, $categoriaDois, $categoriaTres)) {
            print "<script>alert('O fabricante foi salvo com sucesso.'); </script>";
            header("Refresh: 2;url=index.php");
        } else {
            echo "Não foi possível cadastrar o fabricante.";
        }
        break;
    case 'produto':
        $nomeProduto = $_POST['nomeProduto'];
        $nomeCategoria = $_POST['nomeCategoria'];
        $preco = $_POST['preco'];
        $idfabricante = $_POST['fabricante'];

        // Verifique se os campos obrigatórios estão preenchidos
        if (empty($nomeProduto) || empty($nomeCategoria) || empty($preco) || empty($idfabricante)) {
            echo "Preencha todos os campos obrigatórios.";
            return; // Saia da função se campos obrigatórios estiverem em branco
        }

        $fa = explode("_", $idfabricante);

        if (cadastrarProduto($conn, $nomeProduto, $fa[0], $nomeCategoria, $preco, $fa[1])) {
            print "<script>alert('O produto foi salvo com sucesso.'); </script>";
            header("Refresh: 2;url=index.php");
        } else {
            echo "Não foi possível cadastrar o produto.";
        }
        break;
    default:
        print "Erro detectado, volte e tente novamente.";
        header("refresh: 2,url=novo");
}
<?php
function cadastrarFabricante($conn, $nomeFabricante, $categoriaUm, $categoriaDois, $categoriaTres)
{
    $sql = "INSERT INTO `fabricante`(`nomeFabricante`, `categoriaUm`, `categoriaDois`, `categoriaTres`) VALUES ('$nomeFabricante','$categoriaUm','$categoriaDois','$categoriaTres')";
    return mysqli_query($conn, $sql);
}

function cadastrarProduto($conn, $nomeProduto, $fabricante, $categoria, $preco, $fabricante_idfabricante)
{
    $sql = "INSERT INTO `produto` (`nomeProduto`, `fabricante`, `categoria`, `preco`, `fabricante_idfabricante`) VALUES ('$nomeProduto ', '$fabricante', '$categoria', '$preco', '$fabricante_idfabricante')";
    return mysqli_query($conn, $sql);
}

function checkLogin($conn, $login, $senha)
{
    $login = mysqli_real_escape_string($conn, $login);
    $senha = mysqli_real_escape_string($conn, $senha);

    $SQL = "SELECT `idusuario`,`login`, `senha` FROM `usuario` WHERE login ='" . $login . "'";
    $result_id = mysqli_query($conn, $SQL) or die("Erro no banco de dados!");
    $total = mysqli_num_rows($result_id);

    if ($total) {
        $dados = mysqli_fetch_array($result_id);

        if (md5($senha) === $dados["senha"]) {

            session_start();
            $_SESSION["nome_usuario"] = stripslashes($dados["login"]);
            
            //$_SESSION["permissao"] = $dados["postar"];
            //header("Location: index.php");
            $status = "Login efetuado com sucesso!";
            print "<script>alert('Login efetuado com sucesso!'); </script>";
            header("Refresh: 2;?page=loanding");
        } else {
            $status = "Login inválido!";
            print "<script>alert('Senha inválida'); </script>";
            header("Location: ?index.php&error=login");
            
        }
    } else {
        $status = "Login ou senha inválidos!";
        print "<script>alert('Login inválido'); </script>";
        header("Location: ?index.php&error=senha");
        
    }
    return $status;
}

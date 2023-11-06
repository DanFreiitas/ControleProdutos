<?php
function adicionarFabricante($conn, $fabricante)
{
    if (empty($fabricante["nomeFabricante"]) || empty($fabricante["cnpj"])) {
        echo "<script>alert('O nome do fabricante e CNPJ são obrigatórios')</script>";
        header("Refresh: 2;../view/dashboard.php?pagina=novoFabricante");
    }

    $sqlVerificarNome = "SELECT `nomeFabricante` FROM fabricante WHERE nomeFabricante = ?";
    $stmtVerificarNome = $conn->prepare($sqlVerificarNome);
    $stmtVerificarNome->bind_param("s", $fabricante["nomeFabricante"]);
    $stmtVerificarNome->execute();
    $stmtVerificarNome->store_result();

    if ($stmtVerificarNome->num_rows > 0) {
        echo "<script>alert('Fabricante cadastrado.')</script>";
        header("Refresh: 2;../view/dashboard.php?pagina=novoFabricante&fabricante=true");
        return;
    }


    $sqlVerificarCNPJ = "SELECT `cnpj` FROM fabricante WHERE cnpj = ?";
    $stmtVerificarCNPJ = $conn->prepare($sqlVerificarCNPJ);
    $stmtVerificarCNPJ->bind_param("s", $fabricante["cnpj"]);
    $stmtVerificarCNPJ->execute();
    $stmtVerificarCNPJ->store_result();

    if ($stmtVerificarNome->num_rows > 0) {
        echo "<script>alert('CNPJ já cadastrado.')</script>";
        header("Refresh: 2;../view/dashboard.php?pagina=novoFabricante");
        return;
    }



    $sql_inserir = "INSERT INTO fabricante (nomeFabricante, cnpj, telefone, endereco) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_inserir);
    $stmt->bind_param("ssss", $fabricante["nomeFabricante"], $fabricante["cnpj"], $fabricante["telefone"], $fabricante["endereco"]);

    if ($stmt->execute()) {
        #echo "<script>alert('Fabricante adicionado com sucesso!')</script>";
        header("Refresh: 2;../view/dashboard.php?pagina=novoFabricante&fabricante=true");
        
    } else {
        #echo "<script>alert('Ocorreu algum erro, tente novamente ou entre em contato com os administradores!')</script>";
        header("Refresh: 2;../view/dashboard.php?pagina=novoFabricante&fabricante=false");
    }
}
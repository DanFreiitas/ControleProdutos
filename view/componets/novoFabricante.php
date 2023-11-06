<div class="container-fluid">
    <div class="row mt-4">
        <div class="col">
            <div class="containerTitle">
                <h3>ADICIONAR FABRICANTE</h3>
            </div>
        </div>
        <div class="col">
            <div class="containerTitle">
                <h3>REGISTRADOS</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="containerForm">
                <form action="../controller/adicionarFabricante.php" method="POST" class="ml-5 mr-5 mt-2 mb-2">
                    <input type="hidden" name="pagina" value="adicionarFabricante">
                    <div class="mb-3">
                        <label for="nomeFabricante">Nome *</label>
                        <input type="text" name="nomeFabricante" class="form-control"
                            placeholder="Digite o nome do fabricante" required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cnpj">CNPJ *</label>
                        <input type="text" name="cnpj" class="form-control" placeholder="Digite o cnpj" required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" class="form-control" placeholder="Digite o Telefone">
                    </div>
                    <div class="mb-3">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="endereco" class="form-control" placeholder="Digite o endereço">
                    </div>
                    <div class="row">

                    <div class="mb-3">
                            <div class="col">
                                <button type="submit" class="btn btn-secondary">Salvar</button>
                            </div>
                            <div class="col">
                            <?php
                                if(isset($_GET['fabricante']) && $_GET['fabricante'] === "true"){
                                    echo "<div class='alert alert-info mt-2' role='alert'>";
                                    echo "Fabricante adicionado com sucesso!";
                                    echo "</div>";
                                }elseif(isset($_GET['fabricante']) && $_GET['fabricante'] === "false"){
                                    echo "<div class='alert alert-danger mt-2' role='alert'>";
                                    echo "Erro ao adicionar fabricante";
                                    echo "</div>";
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col">
            <div class="containerFabricantes">
                <div class="list-group list-group-flush col-md-8">
                    <?php
                    require "./../controller/listarFabricante.php";
                    $resultados = obterFabricantes($conn);
                    if ($resultados && is_array($resultados)) {
                        foreach ($resultados as $fabricante) {
                            if (isset($fabricante['nomeFabricante'])) {
                                echo "<a href='#' class='list-group-item list-group-item-action'>{$fabricante['nomeFabricante']}</a>";
                                #echo $fabricante['nomeFabricante'] . "<br>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
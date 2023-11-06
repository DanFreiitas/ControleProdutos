<div class="container-fluid">
    <div class="row mt-4">
        <div class="col">
            <div class="containerTitle">
                <h3>ADICIONAR PRODUTO</h3>
            </div>
        </div>
        <div class="col">
            <div class="containerTitle">
                <h3>PRODUTOS CADASTRADOS</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="containerForm">
                <form action="../controller/adicionarProduto.php" method="POST">
                    <input type="hidden" name="acao" value="produto">
                    <div class="mb-3">
                        <label for="nomeProduto">Nome: *</label>
                        <input type="text" name="nomeProduto" class="form-control" placeholder="Nome do produto"
                            required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="fabricante">Fabricante: *</label>
                        <select class="form-select" aria-label="Default select example" name="fabricante"
                            id="fabricante" required>
                            <div class="invalid-feedback">
                                Este campo é obrigatório.
                            </div>
                            <option selected>Selecione o fabricante</option>";
                            <?php
                            require '../controller/selectFabricante.php';
                            if ($resultados) {
                                foreach ($resultados as $row) {
                                    echo "<option value='" . $row['idfabricante'] . "'>" . ucfirst(strtolower($row['nomeFabricante'])) . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nomeCategoria">Categoria: *</label>
                        <select onchange="novaCategoria()" class="form-select" aria-label="Default select example"
                            name="idCategoria" id="categoria" required>
                            <div class="invalid-feedback">
                                Este campo é obrigatório.
                            </div>
                            <option>Selecione a categoria</option>";
                            <?php
                            error_reporting(E_ERROR | E_PARSE);
                            require '../controller/selectCategoria.php';
                            if ($resultados) {
                                foreach ($resultados as $row) {
                                    echo "<option value='{$row['idcategoria']}'>{$row['nomeCategoria']}</option>";
                                }
                            }
                            ?>
                            <option value="novaCategoria">Nova categoria</option>
                        </select>
                        <div id="divNovaCategoria"></div>
                    </div>
                    <div class="mb-3">
                        <label for="preco">Preço: *</label>
                        <input type="text" name="preco" class="form-control" placeholder="Valor do produto" required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="quantidade">Quantidade *</label>
                        <input type="text" name="quantidade" class="form-control" placeholder="Quantidade de unidades"
                            required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="caracteristica">Característica</label>
                        <input type="text" name="caracteristica" class="form-control"
                            placeholder="Característica do produto." required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                    <div class="row">

                        <div class="mb-3">
                            <div class="col">
                                <button type="submit" class="btn btn-secondary">Salvar</button>
                            </div>
                            <div class="col">

                                <?php
                                if (isset($_GET['success']) && $_GET['success'] === "false") {
                                    echo "<div class='alert alert-danger mt-2' role='alert'>";
                                    echo "Categoria digitada já existente!";
                                    echo "</div>";
                                } elseif ($_GET["success"] === "true") {
                                    echo "<div class='alert alert-info mt-2' role='alert'>";
                                    echo "Categoria adicionada com sucesso!";
                                    echo "</div>";
                                } elseif ($_GET["success"] === "novo") {
                                    echo "<div class='alert alert-info mt-2' role='alert'>";
                                    echo "Produto adicionado com sucesso!";
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
            <div class="containerFabricante">
                <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome do produto</th>
                            <th scope="col">Fabricante</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Quantidade</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <ul>
                            <?php
                            require "../controller/listarProduto.php";
                            require "../model/selectNomeFabricante.php";
                            $resultados = obterProdutos($conn);
                            if ($resultados && is_array($resultados)) {
                                $cont = 0;
                                foreach ($resultados as $produtos) {
                                    $cont++;
                                    echo "<tr>";
                                    echo "<th scope='row'>{$cont}</th>";
                                    echo "<td>{$produtos['nomeProduto']}</td>";
                                    $nomeFabricante = obterNomeFabricante($conn, $produtos['fabricante_idfabricante']);
                                    echo "<td>{$nomeFabricante}</td>";
                                    echo "<td>{$produtos['preco']}</td>";
                                    echo "<td>{$produtos['quantidade']}</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </ul>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="containerTitle">
                <h3>ADICIONAR CATEGORIA</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="containerForm">
                <form action="?pagina=adicionarCategoria.php" method="POST" class="ml-5 mr-5 mt-2 mb-2">
                    <input type="hidden" name="pagina" value="adicionarCategoria">
                    <div class="mb-3">
                        <label for="nomeCategoria">Nome da categoria *</label>
                        <input type="text" name="nomeCategoria" class="form-control"
                            placeholder="Informe o nome da categoria" required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-secondary">Salvar</button>
                    </div>
                    <div class="containerWarning">
                        <?php
                        if (isset($_GET['mensagem'])) {
                            if ($_GET['mensagem'] === "success") {
                                echo "<div class='alert alert-info col-md-5' role='alert'>";
                                echo "Categoria adicionada com sucesso!";
                                echo "</div>";
                            } elseif ($_GET['mensagem'] === "error") {
                                echo "<div class='alert alert-danger col-md-5' role='alert'>";
                                echo "Categoria adicionada com sucesso!";
                                echo "</div>";
                            }
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>





</div>
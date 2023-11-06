<?php require "../model/statisticas.php"; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="containerTitle">
                <h3>HOME</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="containerCards">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total de fabricantes:</div>
                    <div class="card-body">
                        <p class="card-text text-white">
                            <?php echo $totalFabricante; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="containerCards">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total de produtos:</div>
                    <div class="card-body">
                        <p class="card-text text-white">
                            <?php echo $totalProdutos; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="containerCards">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total de categorias:</div>
                    <div class="card-body">
                        <p class="card-text text-white">
                            <?php echo $totalCategorias; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="containerCards">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total por fabricantes:</div>
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['totalItensPorFabricante'])) {
                            $totalItensPorFabricante = $_SESSION['totalItensPorFabricante'];
                        
                            foreach ($totalItensPorFabricante as $nomeFabricante => $totalItens) {
                                echo "$nomeFabricante - $totalItens<br>";
                            }
                        } else {
                            echo "Nenhum resultado encontrado.";
                        }?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="containerCards">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total por fabricantes:</div>
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['totalItensPorCategoria'])) {
                            $totalItensPorCategoria = $_SESSION['totalItensPorCategoria'];
                        
                            foreach ($totalItensPorCategoria as $nomeCategoria => $totalItensPorCategoria) {
                                echo "$nomeCategoria - $totalItensPorCategoria<br>";
                            }
                        } else {
                            echo "Nenhum resultado encontrado.";
                        }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
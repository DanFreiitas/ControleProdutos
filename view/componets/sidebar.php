<button class="btn btn-light mt-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop"
    aria-controls="staticBackdrop">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list"
        viewBox="0 0 16 16">
        <path
            d="M1 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm2 3a1 1 0 0 1 1 1h10a1 1 0 0 1-1-1H3zm0 2a1 1 0 0 1 1 1h10a1 1 0 0 1-1-1H3zm0 2a1 1 0 0 1 1 1h7a1 1 0 0 1-1-1H3zm0 2a1 1 0 0 1 1 1h10a1 1 0 0 1-1-1H3z" />
    </svg>
</button>

<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
    aria-labelledby="staticBackdropLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="row">

            <nav id="sidebar" class="d-md-block sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php?pagina=home">
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php?pagina=novoFabricante">
                                Adicionar fabricante
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php?pagina=novoProduto">
                                Adicionar produto
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php?pagina=novaCategoria">
                                Adicionar categoria
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
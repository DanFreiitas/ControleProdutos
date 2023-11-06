<div class="row pt-5 pb-5">
    <div class="form-container mt-5 mb-5" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000">
        <form class="form-container-control" action="?page=logar" method="POST">
            <input type="hidden" name="verificar" value="entrar">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Login</label>
                <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <?php
             if (isset($_GET['error']) && $_GET['error'] === "login") {
                echo "<div class='alert alert-danger mt-2' role='alert'>";
                echo "Credenciais inválidas";
                echo "</div>";
            } elseif (isset($_GET['error']) && $_GET["error"] === "senha") {
                echo "<div class='alert alert-danger mt-2' role='alert'>";
                echo "senha";
                echo "</div>";
            }
                                ?>
            <button type="submit" class="btn btn-secondary">Entrar</button>
            <div class="declaration"><div>
        </form>
    </div>
</div>
<h1>User list</h1>
<?php
require_once "config.php";
 $sql = "SELECT * FROM usuario";
 
 $res = mysqli_query($conn, $sql);

 $qtd = $res->num_rows;

 if($qtd > 0) {
    print "<table class='table table-houver'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome</th>";
    print "<th>Email</th>";
    print "<th>Data de nasimento</th>";
    print "<th>Ações</th>";
    print "</tr>";
    while($row = $res->fetch_object()){
        print "<tr>";
        print "<td>".$row->id."</td>";
        print "<td>".$row->nome."</td>";
        print "<td>".$row->email."</td>";
        print "<td>".$row->dataNasc."</td>";
        print "<td>
        <button onclick=\"location.href='?page=editar&id=".$row->id."';\"class='btn btn-success'>Editar</button>;
        <button class='btn btn-danger'>Excluir< /button></td>";
        print "</tr>";
    }
    print "</table>";
 }else {
    print "<p class='alert alert-danger'>Nenhum usuário encontrado</p>";
 }
<?php
session_start();
if(!$_SESSION["emailusu"]){
    $_SESSION["msg"]="<div class='alert alert-danger' role='alert'>Usuario não cadastrado</div>";
    header("Location:../views/logar.php");
}
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoclie.php");
?>
<div class="container m-5 p-5">
    <form action="listaclieCod.php" method="Post">
        <div class="row mb-3">
            <label for="inputCod" class="col-sm-2 col-form-label">Digite o Código do Cliente: </label>
            <div class="col-sm-3">
                <input type="number" name="codCli" class="form-control" id="inputCod" required>
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </div>
        </div>
    </form>
</div>  
<table class="table">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Cpf</th>
            <th scope="col">Telefone</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Deletar</th>
            <th scope="col">Alterar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $codCliente = isset($_GET['codCli']) ? $_GET['codCli'] : "0";
        if ($codCliente > 0) {
            $clientes = listaclieCod($conexao,$codCliente);
            if ($clientes) {
        ?>
                <tr>
                    <th scope="row"><?= $clientes['codCli'] ?></th>
                    <td><?= $clientes['nomeCli'] ?></td>
                    <td><?= $clientes['cpfCli'] ?></td>
                    <td><?= $clientes['foneCli'] ?></td>
                    <td><?= $clientes['datanasCli'] ?></td>
                    <td>
                        <form action="../controllers/deletarclie.php" method="POST">
                            <input type="hidden" name="codCliDeletar" value="<?= $clientes['codCli'] ?>">
                            <button type="submit" class="btn-small btn-light">Deletar</button>
                        </form>
                    </td>
                    <td>
                        <form action="alterarclie.php" method="POST">
                            <input type="hidden" name="codCliAlterar" value="<?= $clientes['codCli'] ?>">
                            <button type="submit" class="btn-small btn-dark">Alterar</button>
                        </form>
                    </td>
                </tr>
        <?php
            }
        }
        ?>

    </tbody>
</table>
<?php
include_once("footer.php");
?>
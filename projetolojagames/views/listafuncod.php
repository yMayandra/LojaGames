<?php
session_start();
if(!$_SESSION["emailusu"]){
    $_SESSION["msg"]="<div class='alert alert-danger' role='alert'>Usuario não cadastrado</div>";
    header("Location:../views/logar.php");
}
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancofun.php");
?>
<div class="container m-5 p-5">
    <form action="listafuncod.php" method="Post">
        <div class="row mb-3">
            <label for="inputCod" class="col-sm-2 col-form-label">Digite o Código do Funcionario: </label>
            <div class="col-sm-3">
                <input type="number" name="codFun" class="form-control" id="inputCod" required>
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
            <th scope="col">Funcao</th>
            <th scope="col">Telefone</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Deletar</th>
            <th scope="col">Alterar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $codFuncionario = isset($_POST['codFun']) ? $_POST['codFun'] : "0";
        if ($codFuncionario > 0) {
            $funcionarios = listafunCod($conexao,$codFuncionario);
            if ($funcionarios) {
        ?>
                <tr>
                    <th scope="row"><?= $funcionarios['codFun'] ?></th>
                    <td><?= $funcionarios['nomeFun'] ?></td>
                    <td><?= $funcionarios['funcaoFun'] ?></td>
                    <td><?= $funcionarios['foneFun'] ?></td>
                    <td><?= $funcionarios['datanasFun'] ?></td>
                    <td>
                        <form action="../controllers/deletarfun.php" method="POST">
                            <input type="hidden" name="codFunDeletar" value="<?= $funcionarios['codFun'] ?>">
                            <button type="submit" class="btn-small btn-light">Deletar</button>
                        </form>
                    </td>
                    <td>
                        <form action="alterafun.php" method="POST">
                            <input type="hidden" name="codFunAlterar" value="<?= $funcionarios['codFun'] ?>">
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
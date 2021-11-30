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
<table class="table">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Telefone</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Deletar</th>
            <th scope="col">Alterar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $clientes = listaclie($conexao);
        foreach($clientes as $cliente):
        ?>
        <tr>
            <th scope="row"><?=$cliente['codCli']?></th>
            <td><?=$cliente['nomeCli']?></td>
            <td><?=$cliente['cpfCli']?></td>
            <td><?=$cliente['foneCli']?></td>
            <td><?=$cliente['datanasCli']?></td>
            <td>
                <form action="../controllers/deletarclie.php" method="POST">
                    <input type="hidden" name="codCliDeletar" value="<?=$cliente['codCli']?>">
                    <button type="submit" class="btn-small btn-light">Deletar</button>
                </form>
            </td>
            <td>
                <form action="alterarclie.php" method="POST">
                    <input type="hidden" name="codCliAlterar" value="<?=$cliente['codCli']?>">
                    <button type="submit" class="btn-small btn-dark">Alterar</button>
                </form>
            </td>
        </tr>
        <?php
        endforeach;
        ?>
        
    </tbody>
    </table>
<?php
include_once("footer.php");
?>
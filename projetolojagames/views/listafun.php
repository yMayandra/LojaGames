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
<table class="table">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Função</th>
            <th scope="col">Telefone</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Deletar</th>
            <th scope="col">Alterar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $funcionario = listafun($conexao);
        foreach ($funcionario as $funcionarios):
        ?>
        <tr>
            <th scope="row"><?=$funcionarios['codFun']?></th>
            <td><?=$funcionarios['nomeFun']?></td>
            <td><?=$funcionarios['funcaoFun']?></td>
            <td><?=$funcionarios['foneFun']?></td>
            <td><?=$funcionarios['datanasFun']?></td>
            <td>
                <form action="../controllers/deletarfun.php" method="POST">
                    <input type="hidden" name="codFunDeletar" value="<?=$funcionarios['codFun']?>">
                    <button type="submit" class="btn-small btn-light">Deletar</button>
                </form>
            </td>
            <td>
                <form action="alterafun.php" method="POST">
                    <input type="hidden" name="codFunAlterar" value="<?=$funcionarios['codFun']?>">
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
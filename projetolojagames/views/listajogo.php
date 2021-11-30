<?php
session_start();
if(!$_SESSION["emailusu"]){
    $_SESSION["msg"]="<div class='alert alert-danger' role='alert'>Usuario não cadastrado</div>";
    header("Location:../views/logar.php");
}
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancojogos.php");
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Jogo</th>
            <th scope="col">Console</th>
            <th scope="col">Preço</th>
            <th scope="col">Deletar</th>
            <th scope="col">Alterar</th>
        </tr>
    </thead>
    <tbody>
<?php
$jogos = listajogo($conexao);
foreach($jogos as $jogo):
?>
        <tr>
            <th scope="row"><?=$jogo['codJog']?></th>
            <td><?=$jogo['nomeJog']?></td>
            <td><?=$jogo['consoleJog']?></td>
            <td><?=$jogo['precoJog']?></td>
            <td>
            <form action="../controllers/deletarjogos.php" method="Post">
            <input type="hidden" name= "codjogdeletar" value="<?=$jogo['codJog']?>">
            <button type="submit" class="btn btn-light">Deletar</button>
            </form>
            </td>
            <td>
            <form action="alterar.php" method="Post">
            <input type="hidden" name= "codjogalterar" value="<?=$jogo['codJog']?>">
            <button type="submit" class="btn btn-dark">Alterar</button>
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
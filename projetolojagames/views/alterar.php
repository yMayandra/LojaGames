
<?php
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancojogos.php");
?>
    <form method="POST" action="../controllers/alterarjogos.php">

<?php
$codJogo= $_POST["codjogalterar"];
$jogo =listajogoCod($conexao,$codJogo)

?>
<br>
<style>
.card-title{
   text-align: center;
}


</style>
    <div class="tudo">
    <div class="card-body">
    <div class="card w-75 p-4">
    <p class="card-center"> 
    <form action="../controllers/inserirjogos.php" method="POST">
    <p>Código <input type="text" name="codJog"value="<?=$jogo['codJog']?>"></p>
    <p>Jogo <input type="text" name="jogo"value="<?=$jogo['nomeJog']?>"></p>
    <p>Tamanho do jogo <input type= "text" name="tamanhoJog" value="<?=$jogo['tamanhoJog']?>"></p>
     <p>Preço do jogo <input type= "text" name="precoJog"value= "<?=$jogo['precoJog']?>"></p>
     <p>Requisitos <input type="text" name="requisitoJog" value="<?=$jogo['requisitoJog']?>"></p>
     <p>Console <input type="text" name="consoleJog" value="<?=$jogo['consoleJog']?>"></p>
     <p>Classificação <input type="text" name="classificacaoJog" value="<?=$jogo['classificacaoJog']?>"></p>
     <p>Avaliação <input type="text" name="avaliacaoJog" value="<?=$jogo['avaliacaoJog']?>"></p>
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
</div>
</form>

<?php
include("footer.php");
?>
 
<?php
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancofun.php");
?>
<form method="POST" action="../controllers/alterarfun.php">
<?php 
$codFun=$_POST['codFunAlterar'];
$funcionario=listafunCod($conexao,$codFun);
?>
<br>
<style>
.card-title{
   text-align: center;
}


</style>
    <div class="tudo">
    <div class="card w-75">
    <div class="card-body">
    <div class="card w-75 p-4">
    <p class="card-center"> 
    <p>Código <input type="text" name="codFun" value="<?=$funcionario['codFun']?>"></p>
    <p>Nome <input type="text" name="nomeFun" value="<?=$funcionario['nomeFun']?>"></p>
    <p>Função <input type="text" name="funcaoFun" value="<?=$funcionario['funcaoFun']?>"></p>
    <p>Telefone <input type="text" name="foneFun" value="<?=$funcionario['foneFun']?>"></p>
    <p>Data de Nascimento <input type="date" name="datanasFun" value="<?=$funcionario['datanasFun']?>"></p>
    <button type="submit" class="btn btn-dark">Salvar</button>
</form>
</div>
</div>
<?php
include_once("footer.php");
?>
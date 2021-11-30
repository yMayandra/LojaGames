
<?php
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancousu.php");
?>
<form method="POST" action="../controllers/alterarusu.php">

<?php
$codUsu= $_POST["codusualterar"];
$usu =listausuCod($conexao,$codUsu)

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
    <form action="../controllers/inserirusu.php" method="POST">
    <p>Código <input type="text" name="codusu"value="<?=$usu['codUsu']?>"></p>
    <p>Email <input type="email" name="emailusu"value="<?=$usu['emailUsu']?>"></p>
    <p>Senha <input type= "text" name="senhausu" value="<?=$usu['senhaUsu']?>"></p>
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
</div>
</form>

<?php
include("footer.php");
?>
 
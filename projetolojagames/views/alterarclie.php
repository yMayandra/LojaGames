
<?php
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoclie.php");
?>
    <form method="POST" action="../controllers/alteraclie.php">

<?php
$codCliente= $_POST["codCliAlterar"];
$cliente =listaclieCod($conexao,$codCliente);
$codUsuario = $cliente['codUsuFK'];
$usuario= clienteusuario($conexao,$codUsuario);

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
    <p>Código Cliente <input type="text" name="codCliente"value="<?=$cliente['codCli']?>" readonly></p>
    <p>Código do Usuário <input type="text" name="codUsuFK"value="<?=$cliente['codUsuFK']?>" readonly ></p>
    <p>Email <input type= "text" name="emailUsu" value="<?=$usuario['emailUsu']?>" readonly></p>
     <p>Nome <input type= "text" name="nomeCli"value= "<?=$cliente['nomeCli']?>"></p>
     <p>Cpf <input type="text" name="cpfCli" value="<?=$cliente['cpfCli']?>"></p>
     <p>Telefone <input type="text" name="foneCli" value="<?=$cliente['foneCli']?>"></p>
     <p>Data de Nascimento <input type="date" name="datanasCli" value="<?=$cliente['datanasCli']?>"></p>
     <button type="submit" class="btn btn-dark">Salvar</button>
</div>
</div>
</form>

<?php
include("footer.php");
?>
 
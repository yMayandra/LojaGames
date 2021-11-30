<?php
session_start();
if(!$_SESSION["emailusu"]){
    $_SESSION["msg"]="<div class='alert alert-danger' role='alert'>Usuario não cadastrado</div>";
    header("Location:../views/logar.php");
}
include_once("../models/conexao.php");
include_once("../models/bancoclie.php");
include_once("../models/bancousu.php");
include_once("header.php");

?>

<form action="cadastroclie.php" method="Post">
<div class="container m-5 p-5">
<div class="row mb-3">
    <label for="inputcod" class="col-sm-2 col-form-label">Digite o Código do Usuario</label>
    <div class="col-sm-3">
      <input type="text" require name="codUsu" class="form-control" id="inputCod">
    </div>
    <div class="col-sm-3">
    <button type="submit" class="btn btn-dark">Pesquisar </button>
    </div>
</div>
</div>
</form>

<?php
$codUsu = isset($_POST['codUsu']) ? $_POST['codUsu'] : 0;
$usuario=listausuCod($conexao,$codUsu);
if($usuario){
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
<form method="POST" action="../controllers/inserirclie.php">
    <p>Código Usuário <input type="text" name="codUsu" value="<?=$usuario['codUsu']?>"></p>    
    <p>Nome <input type="text" name="nomeCli"></p>
    <p>CPF <input type="text" name="cpfCli"></p>
    <p>Telefone <input type="text" name="foneCli"></p>
    <p>Data de Nascimento <input type="date" name="datanasCli"></p>
    <button type="submit" class="btn btn-dark">Salvar</button>
    </div>
</div>
</form>

<?php
}
include_once("footer.php");

?>
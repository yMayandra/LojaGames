<?php
session_start();
if(!$_SESSION["emailusu"]){
    $_SESSION["msg"]="<div class='alert alert-danger' role='alert'>Usuario não cadastrado</div>";
    header("Location:../views/logar.php");
}
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancousu.php");
?>
<form action="listausuCod.php" method="GET">
<div class="container m-5 p-5">
<div class="row mb-3">
    <label for="inputcod" class="col-sm-2 col-form-label">Digite o Código do usuario</label>
    <div class="col-sm-3">
      <input type="number" require name="codusu" class="form-control" id="inputCod">
    </div>
    <div class="col-sm-3">
    <button type="submit" class="btn btn-dark">Pesquisar </button>
    </div>
</div>
</div>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Email</th>
            <th scope="col">Senha</th>
            <th scope="col">Deletar</th>
            <th scope="col">Alterar</th>
        </tr>
    </thead>
    <tbody>
<?php
$codusu = isset( $_GET['codusu'])?$_GET['codusu']:0;
if($codusu>0){
$usu = listausuCod($conexao,$codusu);

?>
        <tr>
            <th scope="row"><?=$usu['codUsu']?></th>
            <td><?=$usu['emailUsu']?></td>
            <td><?=$usu['senhaUsu']?></td>
            <td>
            <form action="../controllers/deletarusu.php" method="Post">
            <input type="hidden" name= "codusudeletar" value="<?=$usu['codUsu']?>">
            <button type="submit" class="btn btn-light">Deletar</button>
            </form>
            </td>
            <td>
            <form action="usualterar.php" method="Post">
            <input type="hidden" name= "codusualterar" value="<?=$usu['codUsu']?>">
            <button type="submit" class="btn btn-dark">Alterar</button>
            </form>
            </td>
        </tr>
 <?php
}
 ?>    
    </tbody>
</table>


<?php
include_once("footer.php");
?>
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
<form action="listabuscafun.php"method="GET">
<div class="row mb-3">
<label for="inputName"class="col-sm-2 col-form-label">Digite o nome do Funcionarios</label>
<div class="col-sm-3">
<input type="text"class="form-control"name="nomeFun"id="inputName"required>
</div>
<div class="col-sm-3">
<button type="submit"class="btn-sm btn-dark">Buscar</button>
</div>
</div>
</form>
</div>
    
<table class="table">
<thead>
<tr>
<th scope="col">Código</th>
<th scope="col">Código Usuário</th>
<th scope="col">Funcionario</th>
<th scope="col">Função</th>
<th scope="col">Telefone</th>
<th scope="col">Data de nascimento</th>
<th scope="col">Deletar</th>
<th scope="col">Alterar</th>
</tr>
</thead>
<tbody>
<?php
$nomeFun = isset($_GET['nomeFun'])?$_GET['nomeFun']:"";
$funcionario =listabuscafun($conexao,$nomeFun);
foreach($funcionario as $funcionarios):
?>

<tr>
<th scope="row"><?=$funcionarios['codFun'] ?></th>
<td><?=$funcionarios['codUsuFK'] ?></td>
<td><?=$funcionarios['nomeFun'] ?></td>
<td><?=$funcionarios['funcaoFun'] ?></td>
<td><?=$funcionarios['foneFun'] ?></td>
<td><?=$funcionarios['datanasFun'] ?></td>
<td>
<form action="../controllers/deletarfun.php"method="POST">
<input type="hidden"name="codFunDeletar"value="<?=$funcionarios['codFun'] ?>">
<button type="submit"class="btn-sm btn-light">Deletar</button>
</form>
</td>
<td>
<form action="alterafun.php"method="POST">
<input type="hidden"name="codFunAlterar"value="<?=$funcionarios['codFun'] ?>">
<button type="submit"class="btn-sm btn-dark">Alterar</button>
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

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
<div class="container m-5 p-5">
<form action="listadeclientepornome.php" method="GET">
<div class="row mb-3">
<label for="inputName"class="col-sm-2 col-form-label">Digite o nome do Cliente</label>
<div class="col-sm-3">
<input type="text"class="form-control"name="nomecliente"id="inputName"required>
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
<th scope="col">Cliente</th>
<th scope="col">CPF</th>
<th scope="col">Telefone</th>
<th scope="col">Data de nascimento</th>
<th scope="col">Deletar</th>
<th scope="col">Alterar</th>
</tr>
</thead>
<tbody>
<?php
$nomecliente = isset($_GET['nomecliente'])?$_GET['nomecliente']:"";
$cliente = listatudoClienteNome($conexao,$nomecliente);
foreach($cliente as $clientes):
?>

<tr>
<th scope="row"><?=$clientes['codCli'] ?></th>
<td><?=$clientes['codUsuFK'] ?></td>
<td><?=$clientes['nomeCli'] ?></td>
<td><?=$clientes['cpfCli'] ?></td>
<td><?=$clientes['foneCli'] ?></td>
<td><?=$clientes['datanasCli'] ?></td>
<td>
<form action="../controllers/deletarclie.php"method="POST">
<input type="hidden"name="codCliDeletar"value="<?=$clientes['codCli'] ?>">
<button type="submit"class="btn-sm btn-light">X</button>
</form>
</td>
<td>
<form action="alterarclie.php"method="POST">
<input type="hidden"name="codCliAlterar"value="<?=$clientes['codCli'] ?>">
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

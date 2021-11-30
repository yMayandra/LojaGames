
<?php
session_start();
if(!$_SESSION["emailusu"]){
    $_SESSION["msg"]="<div class='alert alert-danger' role='alert'>Usuario não cadastrado</div>";
    header("Location:../views/logar.php");
}
include("../views/header.php");
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
    <form method="Post" action="../controllers/inserirjogos.php">
        <p>Jogo <input type="text" name="jogo"></p>
        <p>Tamanho do Jogo <input type="text" name="tamanhojog"></p>
        <p>Preço  <input type="text" name="precojog"></p>
        <p>Requisito do Jogo <input type="text" name="requisitojog"></p>
        <p>Console compativeis <input type="text" name="consolejog"></p>
        <p>Classificação indicativa<input type="text" name="classificacaojog"></p>
        <p>Avaliação <input type="text" name="avaliacaojog"></p>
        <button type="submit" class="btn btn-dark">Salvar</button>
    </form>    
</div>
</div>
<?php
include("../views/footer.php");
?>
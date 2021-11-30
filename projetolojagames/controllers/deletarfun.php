<?php
include("../models/conexao.php");
include("../models/bancofun.php");
include("../views/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(deletarfun($conexao,$codFunDeletar)){
    echo("Funcionario deletado com sucesso.");
}else{
    echo("Funcionario não deletado.");
}
include("../views/footer.php");
?>
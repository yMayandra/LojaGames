<?php
include("../models/conexao.php");
include("../models/bancofun.php");
include("../views/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(alterarfun($conexao,$nomeFun,$funcaoFun,$foneFun,$datanasFun)){
    echo("Funcionario alterado com sucesso.");
}else{
    echo("Funcionairo não alterado.");
}
include("../views/footer.php");
?>
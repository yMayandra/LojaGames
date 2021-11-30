<?php
include("../models/conexao.php");
include("../models/bancousu.php");
include("../models/bancofun.php");
include("../views/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(inserirfun($conexao,$codUsu,$nomeFun,$funcaoFun,$foneFun,$datanasFun)){
    echo("Funcionario cadastrado com sucesso.");
}else{
    echo("Funcionario não cadastrado.");
}
include("../views/footer.php");
?>